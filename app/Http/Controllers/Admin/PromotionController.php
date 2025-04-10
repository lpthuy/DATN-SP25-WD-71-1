<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function toggleStatus(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->is_active = !$promotion->is_active;
        $promotion->save();

        return redirect()->route('promotions.index')
            ->with('success', 'Trạng thái khuyến mãi đã được cập nhật.');
    }

    public function apply(Request $request)
    {
        $code = $request->input('code');
        $total = $request->input('total');

        $promotion = Promotion::active()->where('code', $code)->first();

        if (!$promotion) {
            return response()->json(['success' => false, 'message' => 'Mã không hợp lệ hoặc đã hết hạn!']);
        }

        if ($total < $promotion->min_purchase_amount) {
            return response()->json(['success' => false, 'message' => 'Đơn hàng chưa đạt giá trị tối thiểu!']);
        }

        $discount = 0;
        if ($promotion->discount_type === 'fixed') {
            $discount = $promotion->discount_value;
        } elseif ($promotion->discount_type === 'percentage') {
            $discount = ($promotion->discount_value / 100) * $total;
        }

        if ($promotion->usage_limit !== null) {
            $promotion->decrement('usage_limit');

            // Kiểm tra và cập nhật trạng thái nếu hết mã
            if ($promotion->usage_limit <= 0) {
                $promotion->is_active = 0;
                $promotion->save();
            }
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
        session([
            'promo_code' => $request->code,
            'promo_discount' => $request->discount,
        ]);

        return response()->json(['success' => true]);
    }

    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:50|unique:promotion,code',
            'discount_type' => 'required|in:fixed,percentage',
            'discount_value' => 'required|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'min_purchase_amount' => 'nullable|numeric|min:0',
        ]);

        Promotion::create($request->all());

        return redirect()->route('promotions.index')
            ->with('success', 'Khuyến mãi đã được tạo thành công.');
    }

    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotions.edit', compact('promotion'));
    }

    public function update(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);

        $request->validate([
            'code' => 'required|string|max:50|unique:promotion,code,' . $promotion->promotion_id . ',promotion_id',
            'discount_type' => 'required|in:fixed,percentage',
            'discount_value' => 'required|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'min_purchase_amount' => 'nullable|numeric|min:0',
        ]);

        $promotion->update($request->all());

        return redirect()->route('promotions.index')
            ->with('success', 'Khuyến mãi đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return redirect()->route('promotions.index')
            ->with('success', 'Khuyến mãi đã được xóa thành công.');
    }
}
