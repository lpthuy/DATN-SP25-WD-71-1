<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Các trường được phép gán giá trị
    protected $fillable = ['title', 'content', 'image', 'is_active'];

    // Nếu cần, bạn có thể thêm các phương thức bổ sung vào đây để xử lý các yêu cầu đặc biệt
}
