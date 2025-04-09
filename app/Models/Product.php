<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_id', 'discount_price', 'image', 'price'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function variants() {
        return $this->hasMany(ProductVariant::class);
    }
    public function colors() {
        return $this->belongsToMany(Color::class, 'product_color', 'product_id', 'color_id');
    }


    public function sizes() {
        return $this->belongsToMany(Size::class, 'product_size', 'product_id', 'size_id');
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
    protected $attributes = [
        'price' => 0, // Giá mặc định là 0 nếu không có giá trị
    ];

    public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}


}
