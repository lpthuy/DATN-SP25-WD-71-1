<?php


namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Hiển thị danh sách danh mục
     */
    public function index()
{
    $keyword = request('keyword');
    
    // Kiểm tra nếu có từ khóa tìm kiếm
    $categories = Category::when($keyword, function ($query) use ($keyword) {
        return $query->where('name', 'like', "%$keyword%");
    })->latest()->paginate(10);

    return view('admin.categories.index', compact('categories'));
}

    /**
     * Hiển thị form thêm danh mục
     */
    public function create()
    {
        $categories = Category::whereNull('parent_category_id')->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Lưu danh mục mới vào database
     */
    public function store(Request $request)
{
    // Validate dữ liệu đầu vào với thông báo tùy chỉnh
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name',  // Đảm bảo tên danh mục là duy nhất
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',  // Ảnh là bắt buộc và phải có định dạng hợp lệ
    ], [
        'name.unique' => 'Danh mục đã tồn tại', // Tùy chỉnh thông báo lỗi khi tên danh mục đã tồn tại
    ]);

    // Xử lý ảnh nếu có
    $imagePath = null;
    if ($request->hasFile('image')) {
        // Lưu ảnh vào thư mục 'categories' trong storage
        $imagePath = $request->file('image')->store('categories', 'public');
    }

    // Lưu thông tin danh mục vào database
    Category::create([
        'name' => $request->input('name'),
        'image_url' => $imagePath, // Lưu đường dẫn ảnh
        'is_active' => $request->has('is_active') ? 1 : 0, // Kiểm tra nếu có 'is_active'
    ]);

    // Quay lại trang danh sách với thông báo thành công
    return redirect()->route('categories.index')->with('success', 'Danh mục đã được tạo thành công!');
}
  
    public function edit(Category $category)
    {
        $categories = Category::whereNull('parent_category_id')->where('id', '!=', $category->id)->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Cập nhật danh mục trong database
     */
    public function update(Request $request, Category $category)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validation cho ảnh
            'parent_category_id' => 'nullable|exists:categories,id',
            'is_active' => 'nullable|boolean',
        ]);

        // Xử lý ảnh nếu có
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($category->image_url && Storage::exists('public/' . $category->image_url)) {
                Storage::delete('public/' . $category->image_url);
            }

            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('categories', 'public');
        } else {
            // Nếu không có ảnh mới thì giữ nguyên ảnh cũ
            $imagePath = $category->image_url;
        }

        // Cập nhật thông tin danh mục
        $category->update([
            'name' => $request->input('name'),
            'parent_category_id' => $request->input('parent_category_id'),
            'image_url' => $imagePath, // Lưu đường dẫn ảnh
           
        ]);

        // Quay lại trang danh sách với thông báo thành công
        return redirect()->route('categories.index')->with('success', 'Danh mục đã được cập nhật!');
    }


    public function destroy(Category $category)
    {
        if ($category->children()->count() > 0) {
            return redirect()->route('admin.categories.index')->with('error', 'Không thể xóa danh mục này vì có danh mục con.');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Danh mục đã bị xóa!');
    }
    public function toggle(Category $category)
    {
        $category->toggleStatus(); // Gọi hàm xử lý bật/tắt
    
        return redirect()->route('categories.index')->with('success', 'Trạng thái danh mục và sản phẩm đã được thay đổi!');
    }
    
}
