<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    // Chỉ định tên bảng chính xác trong cơ sở dữ liệu
    protected $table = 'promotion';

    protected $primaryKey = 'promotion_id';

    // Các trường có thể gán giá trị hàng loạt
    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'usage_limit',
        'start_date',
        'end_date',
        'is_active',
        'tier_id',
        'min_purchase_amount'
    ];
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'promotion_id');
    }
}
