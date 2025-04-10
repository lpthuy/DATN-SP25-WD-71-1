<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model {
    use HasFactory;

    protected $fillable = ['name', 'parent_category_id', 'image_url', 'is_active'];

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function toggleStatus()
{
    $this->is_active = !$this->is_active; // Đảo trạng thái danh mục
    $this->save();

    // Cập nhật trạng thái tất cả sản phẩm thuộc danh mục này theo trạng thái danh mục
    $this->products()->update(['is_active' => $this->is_active]);
}

    
}
