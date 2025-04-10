<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RevenueStatisticsController extends Controller
{
    public function statistics(Request $request)
    {
        $filterType = $request->input('filter_type', 'day');
        $filterValue = $request->input('filter_value', Carbon::now()->format('Y-m-d'));
        $filterStatus = $request->input('filter_status'); // Bộ lọc trạng thái

        // Truy vấn doanh thu và số lượng đơn hàng theo trạng thái
        $statusQuery = Order::selectRaw("
            status,
            SUM((SELECT SUM(quantity * price) FROM order_items WHERE order_id = orders.id)) as revenue,
            COUNT(*) as order_count
        ")
            ->groupBy('status');

        // Áp dụng bộ lọc thời gian
        if ($filterType == 'day') {
            $statusQuery->whereDate('created_at', $filterValue);
        } elseif ($filterType == 'month') {
            $statusQuery->whereMonth('created_at', Carbon::parse($filterValue)->month)
                ->whereYear('created_at', Carbon::parse($filterValue)->year);
        } elseif ($filterType == 'year') {
            $statusQuery->whereYear('created_at', $filterValue);
        }

        // Áp dụng bộ lọc trạng thái nếu có
        if ($filterStatus) {
            $statusQuery->where('status', $filterStatus);
        }

        // Lấy dữ liệu
        $statisticsByStatus = $statusQuery->get()->mapWithKeys(function ($item) {
            return [$item->status => ['revenue' => $item->revenue, 'order_count' => $item->order_count]];
        });

        // Danh sách trạng thái để hiển thị trong bộ lọc
        $statuses = Order::select('status')->distinct()->pluck('status')->toArray();

        return view('admin.statistics.revenue', compact('statisticsByStatus', 'filterType', 'filterValue', 'filterStatus', 'statuses'));
    }

    private function getDateFormat($type)
    {
        return match ($type) {
            'day' => '%Y-%m-%d',
            'month' => '%Y-%m',
            'year' => '%Y',
            default => '%Y-%m-%d',
        };
    }
}
