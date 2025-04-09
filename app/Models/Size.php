<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model {
    use HasFactory;

    protected $fillable = ['size_name'];

    public $timestamps = false;

    public function variants() {
        return $this->hasMany(ProductVariant::class);
    }
    public function products() {
        return $this->belongsToMany(Product::class, 'product_size', 'size_id', 'product_id');
    }
    
}
