<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'product_id', 'variant_id', 'product_name',
        'color', 'size', 'quantity', 'price'
    ];
    

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function order()
{
    return $this->belongsTo(Order::class);
}


}
