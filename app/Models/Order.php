<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Color;
use App\Models\Size;

use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'order_code', 'payment_method', 'promotion_code', 'status', 'is_paid', 'delivered_at'];



    public static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->order_code = 'OD' . strtoupper(Str::random(6)); // Ví dụ: OD3XG7FZ
        });
    }


    // ✅ Quan hệ để lấy tên màu sắc
    public function colorName()
    {
        return $this->belongsTo(Color::class, 'color', 'id'); 
    }

    // ✅ Quan hệ để lấy tên kích thước
    public function sizeName()
    {
        return $this->belongsTo(Size::class, 'size', 'id'); 
    }

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function items()
{
    return $this->hasMany(OrderItem::class);
}

}

