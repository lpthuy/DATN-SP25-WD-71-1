<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
   

public function apply(Request $request)
{
    $code = $request->input('code');
    $total = $request->input('total');

    $promotion = Promotion::where('code', $code)
        ->where('is_active', 1)
        ->where('start_date', '<=', Carbon::now())
        ->where('end_date', '>=', Carbon::now())
        ->first();

    if (!$promotion) {
        return response()->json(['success' => false, 'message' => 'Mã không hợp lệ hoặc đã hết hạn!']);
    }

    if ($total < $promotion->min_purchase_amount) {
        return response()->json(['success' => false, 'message' => 'Đơn hàng chưa đạt giá trị tối thiểu!']);
    }

    // Tính giảm giá
    $discount = 0;
    if ($promotion->discount_type === 'fixed') {
        $discount = $promotion->discount_value;
    } elseif ($promotion->discount_type === 'percentage') {
        $discount = ($promotion->discount_value / 100) * $total;
    }

    return response()->json([
        'success' => true,
        'message' => 'Áp dụng mã thành công!',
        'discount' => round($discount),
        'code' => $code
    ]);
}

public function saveCode(Request $request)
{
    $code = $request->input('code');
    session(['applied_promo_code' => $code]);

    return response()->json(['success' => true]);
}


    // Hiển thị danh sách khuyến mãi
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotions.index', compact('promotions'));
    }

    // Hiển thị form tạo khuyến mãi mới
    public function create()
    {
        return view('admin.promotions.create');
    }

    // Lưu khuyến mãi mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'code'             => 'required|string|max:50|unique:promotion,code',
            'discount_type'    => 'required|in:fixed,percentage',
            'discount_value'   => 'required|numeric|min:0',
            'usage_limit'      => 'nullable|integer|min:0',
            'start_date'       => 'required|date',
            'end_date'         => 'required|date|after:start_date',
            'min_purchase_amount' => 'nullable|numeric|min:0',
        ]);

        Promotion::create($request->all());

        return redirect()->route('promotions.index')
            ->with('success', 'Khuyến mãi đã được tạo thành công.');
    }

    // Hiển thị chi tiết khuyến mãi hoặc form chỉnh sửa
    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotions.edit', compact('promotion'));
    }

    // Cập nhật khuyến mãi
    public function update(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);

        $request->validate([
            'code'             => 'required|string|max:50|unique:promotion,code,' . $promotion->promotion_id . ',promotion_id',
            'discount_type'    => 'required|in:fixed,percentage',
            'discount_value'   => 'required|numeric|min:0',
            'usage_limit'      => 'nullable|integer|min:0',
            'start_date'       => 'required|date',
            'end_date'         => 'required|date|after:start_date',
            'min_purchase_amount' => 'nullable|numeric|min:0',
        ]);

        $promotion->update($request->all());

        return redirect()->route('promotions.index')
            ->with('success', 'Khuyến mãi đã được cập nhật thành công.');
    }

    // Xóa khuyến mãi
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return redirect()->route('promotions.index')
            ->with('success', 'Khuyến mãi đã được xóa thành công.');
    }
}
