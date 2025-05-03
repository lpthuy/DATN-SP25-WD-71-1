<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RevenueStatisticsController extends Controller
{
    public function statistics(Request $request)
    {
        $filterMonth = $request->input('filter_month');
        $filterYear = $request->input('filter_year');
        $fromDate = $request->input('from');
        $toDate = $request->input('to');
        $selectedStatus = $request->input('status', 'all');
        $includedStatuses = ['completed', 'đã nhận hàng'];

        // Xác định khoảng thời gian lọc
        if ($filterMonth && $filterYear) {
            $startDate = Carbon::createFromDate($filterYear, $filterMonth, 1)->startOfDay();
            $endDate = Carbon::createFromDate($filterYear, $filterMonth, 1)->endOfMonth()->endOfDay();
        } else {
            $startDate = $fromDate ? Carbon::parse($fromDate)->startOfDay() : Carbon::now()->subDays(6)->startOfDay();
            $endDate = $toDate ? Carbon::parse($toDate)->endOfDay() : Carbon::now()->endOfDay();
        }

        // Lọc đơn hàng theo trạng thái (nếu có)
        $ordersQuery = Order::with('items')
            ->whereBetween('created_at', [$startDate, $endDate]);

        if ($selectedStatus !== 'all') {
            $ordersQuery->where('status', $selectedStatus);
        }

        $orders = $ordersQuery->get();

        // Tổng số đơn theo bộ lọc
        $orderStats = [
            'total_filtered' => $orders->count(),
            'total_today' => Order::whereDate('created_at', Carbon::today())->count(),
            'total_week' => Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count(),
            'total_month' => Order::whereMonth('created_at', Carbon::now()->month)->count(),

            'today' => Order::whereDate('created_at', Carbon::today())->whereIn('status', $includedStatuses)->count(),
            'week' => Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->whereIn('status', $includedStatuses)->count(),
            'month' => Order::whereMonth('created_at', Carbon::now()->month)->whereIn('status', $includedStatuses)->count(),

            'avg_order_value' => round($orders->sum(fn($order) => $order->items->sum(fn($item) => $item->quantity * $item->price)) / max($orders->count(), 1), 0),
            'by_status' => [],
        ];

        $availableStatuses = Order::select('status')->distinct()->pluck('status')->toArray();

        foreach ($availableStatuses as $status) {
            $ordersByStatus = Order::with('items')
                ->where('status', $status)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->get();

            $orderStats['by_status'][$status] = [
                'order_count' => $ordersByStatus->count(),
                'revenue' => in_array($status, $includedStatuses)
                    ? $ordersByStatus->sum(fn($o) => $o->items->sum(fn($i) => $i->quantity * $i->price))
                    : 0,
            ];
        }

        $totalRevenue = $orders->whereIn('status', $includedStatuses)
            ->sum(fn($o) => $o->items->sum(fn($i) => $i->quantity * $i->price));

        // Doanh thu theo bộ lọc
        $revenueStats = [
            'today' => $this->revenueByDate(Carbon::today(), $includedStatuses),
            'month' => $totalRevenue, // Đã lọc theo thời gian và status ở trên
            'profit' => round($totalRevenue * 0.2),
            'top_day' => '',
            'chart_data' => [],
        ];

        $topDay = Order::selectRaw("DATE(created_at) as day, SUM((SELECT SUM(quantity * price) FROM order_items WHERE order_id = orders.id)) as revenue")
            ->whereIn('status', $includedStatuses)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('day')
            ->orderByDesc('revenue')
            ->limit(1)
            ->first();

        $revenueStats['top_day'] = $topDay?->day ?? 'Không có dữ liệu';

        // Dữ liệu biểu đồ
        $daysRange = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate)) + 1;
        $dateLabels = collect(range(0, $daysRange - 1))->mapWithKeys(function ($i) use ($startDate) {
            return [$startDate->copy()->addDays($i)->toDateString() => 0];
        });

        $chartQuery = Order::selectRaw("DATE(created_at) as day, SUM((SELECT SUM(quantity * price) FROM order_items WHERE order_id = orders.id)) as revenue")
            ->whereIn('status', $includedStatuses)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('day')
            ->pluck('revenue', 'day');

        $revenueStats['chart_data'] = $dateLabels->merge($chartQuery)->toArray();

        // Thống kê sản phẩm
        $productStats = [
            'top_seller' => Product::select('products.name', DB::raw('SUM(order_items.quantity) as total_sold'))
                ->join('order_items', 'products.id', '=', 'order_items.product_id')
                ->join('orders', 'order_items.order_id', '=', 'orders.id')
                ->whereIn('orders.status', $includedStatuses)
                ->groupBy('products.id', 'products.name')
                ->orderByDesc('total_sold')
                ->limit(10)
                ->get(),

            'low_stock' => ProductVariant::where('stock_quantity', '<=', 10)->get(),

            'least_seller' => Product::leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
                ->leftJoin('orders', 'order_items.order_id', '=', 'orders.id')
                ->where(function ($q) use ($includedStatuses) {
                    $q->whereNull('orders.status')->orWhereIn('orders.status', $includedStatuses);
                })
                ->select('products.*', DB::raw('COALESCE(SUM(order_items.quantity), 0) as total_sold'))
                ->groupBy('products.id', 'products.name')
                ->orderBy('total_sold', 'asc')
                ->limit(10)
                ->get(),
        ];

        // Thống kê khách hàng
        $customerStats = [
            'new_today' => User::whereDate('created_at', Carbon::today())->count(),

            'top_buyers' => User::withCount(['orders as total_spent' => function ($q) use ($startDate, $endDate, $includedStatuses) {
                $q->whereIn('status', $includedStatuses)
                  ->whereBetween('created_at', [$startDate, $endDate])
                  ->select(DB::raw("SUM((SELECT SUM(quantity * price) FROM order_items WHERE order_id = orders.id))"));
            }])
            ->having('total_spent', '>', 0)
            ->orderByDesc('total_spent')
            ->limit(3)
            ->get(),

            'loyal_customers' => User::withCount(['orders' => function ($q) use ($startDate, $endDate, $includedStatuses) {
                $q->whereIn('status', $includedStatuses)
                  ->whereBetween('created_at', [$startDate, $endDate]);
            }])
            ->having('orders_count', '>', 0)
            ->orderByDesc('orders_count')
            ->limit(3)
            ->get(),
        ];

        return view('admin.statistics.revenue', compact(
            'orderStats',
            'revenueStats',
            'productStats',
            'customerStats',
            'startDate',
            'endDate',
            'selectedStatus',
            'availableStatuses'
        ));
    }

    private function revenueByDate($date, $includedStatuses)
    {
        return (float) Order::selectRaw("SUM((SELECT SUM(quantity * price) FROM order_items WHERE order_id = orders.id)) as revenue")
            ->whereIn('status', $includedStatuses)
            ->whereDate('created_at', $date)
            ->value('revenue') ?? 0;
    }
}
