<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Hiển thị danh sách bài viết
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    // Hiển thị form tạo bài viết mới
    public function create()
    {
        return view('admin.posts.create');
    }

    // Lưu bài viết mới
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra ảnh
        ]);
    
        // Kiểm tra và lưu ảnh nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null; // Nếu không có ảnh thì không lưu
        }
    
        // Tạo bài viết
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,  // Lưu đường dẫn ảnh vào cơ sở dữ liệu
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Bài viết đã được tạo!');
    }
    

    // Hiển thị bài viết cụ thể
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    // Hiển thị form chỉnh sửa bài viết
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    // Cập nhật bài viết
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra ảnh
        ]);
    
        // Kiểm tra và lưu ảnh nếu có
        if ($request->hasFile('image')) {
            // Nếu bài viết đã có ảnh, xóa ảnh cũ
            if ($post->image) {
                Storage::delete('public/images/' . $post->image);
            }
            
            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            // Nếu không có ảnh mới, giữ lại ảnh cũ
            $imagePath = $post->image;
        }
    
        // Cập nhật bài viết
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath, // Lưu đường dẫn ảnh vào cơ sở dữ liệu
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Bài viết đã được cập nhật!');
    }
    
    // Xóa bài viết
    public function destroy(Post $post)
    {
        // Xóa ảnh nếu có
        if ($post->image) {
            // Xóa ảnh trong thư mục public/storage/images
            Storage::delete('public/images/' . $post->image);
        }
    
        // Xóa bài viết
        $post->delete();
    
        return redirect()->route('posts.index')->with('success', 'Bài viết đã bị xóa!');
    }
    public function toggleStatus(Post $post)
{
    // Đảo ngược trạng thái (nếu đang bật thì tắt và ngược lại)
    $post->is_active = !$post->is_active;
    
    // Lưu lại trạng thái mới
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Trạng thái bài viết đã được cập nhật!');
}

    
}

