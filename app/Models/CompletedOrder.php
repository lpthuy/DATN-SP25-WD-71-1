<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedOrder extends Model
{
    use HasFactory;

    protected $table = 'completed_orders';

    protected $fillable = [
        'order_id',
        'shipper_id',
        'completed_at',
    ];

    public $timestamps = true;

    // Mối quan hệ với đơn hàng
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Mối quan hệ với người giao hàng
    public function shipper()
    {
        return $this->belongsTo(User::class, 'shipper_id');
    }
}
