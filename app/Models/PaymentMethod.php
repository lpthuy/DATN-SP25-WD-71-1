<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    // Đặt tên bảng (nếu cần thiết)
    protected $table = 'payment_methods';

    // Các thuộc tính có thể gán đại trà
    protected $fillable = [
        'method_name', 
        'description', 
        'image_path'
    ];

    // Nếu sử dụng timestamps tự động
    public $timestamps = true;
}
