<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model {
    use HasFactory;

    protected $fillable = ['product_id', 'size_id', 'color_id', 'stock_quantity', 'discount_price', 'price', 'sku', 'image_url'];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
    
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}
