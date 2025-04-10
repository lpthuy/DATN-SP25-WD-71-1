<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model {
    use HasFactory;

    protected $fillable = ['color_name', 'color_code'];

    public $timestamps = false;

    public function variants() {
        return $this->hasMany(ProductVariant::class);
    }
    public function products() {
        return $this->belongsToMany(Product::class, 'product_color', 'color_id', 'product_id');
    }
    
}
