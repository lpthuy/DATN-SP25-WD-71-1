<?php

namespace App\Http\Controllers\Client;

use App\Models\Post;
use App\Models\User;
use App\Models\Color;
use App\Models\ProductVariant;
use App\Models\Size;
use App\Models\Banner;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $posts = Post::where('is_active', true)->paginate(4); // Thêm biến $posts
        $promotions = Promotion::where('is_active', 1)
            ->where('start_date', '<=', now()) // Ngày bắt đầu <= ngày hiện tại
            ->where('end_date', '>=', now()) // Ngày kết thúc >= ngày hiện tại
            ->get();
        $products = Product::all(); // Lấy tất cả sản phẩm
        $products = Product::where('is_active', true)->latest()->take(8)->get();
        $banners = Banner::where('status', 1)->orderBy('position', 'asc')->get(); // Lấy banner theo thứ tự position
        $featuredComments = Comment::where('rating', 5)
            ->where('is_visible', true)
            ->latest()
            ->take(5)
            ->get();
        return view('client.pages.home', compact('products', 'banners', 'promotions', 'posts', 'featuredComments'));
    }
    //   lấy toàn bộ sản phẩm in 
    public function filterProducts(Request $request)
    {
        // Lấy danh sách khuyến mãi
        $promotions = Promotion::where('is_active', 1)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->get();

        // Lấy danh sách danh mục để hiển thị trong sidebar
        $categories = Category::where('is_active', 1)->get();

        // Query cơ bản cho sản phẩm
        $query = Product::where('is_active', 1);

        // Lọc theo danh mục
        if ($request->filled('category_id') && is_numeric($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }

        // Lọc theo màu sắc (dựa trên product_variants)
        if ($request->has('colors') && is_array($request->colors) && !empty($request->colors)) {
            $colors = array_filter($request->colors, 'is_numeric');
            if (!empty($colors)) {
                $query->whereHas('variants', function ($q) use ($colors) {
                    $q->whereIn('product_variants.color_id', $colors);
                });
            }
        }

        // Lọc theo kích thước (dựa trên product_variants)
        if ($request->has('sizes') && is_array($request->sizes) && !empty($request->sizes)) {
            $sizes = array_filter($request->sizes, 'is_numeric');
            if (!empty($sizes)) {
                $query->whereHas('variants', function ($q) use ($sizes) {
                    $q->whereIn('product_variants.size_id', $sizes);
                });
            }
        }

        // Lọc theo khoảng giá (dựa trên product_variants)
        if ($request->filled('price_range')) {
            $query->whereHas('variants', function ($q) use ($request) {
                $q->where(function ($subQuery) use ($request) {
                    // Ưu tiên discount_price nếu có, nếu không thì dùng price
                    switch ($request->price_range) {
                        case 'under_200k':
                            $subQuery->whereNotNull('discount_price')
                                ->where('discount_price', '<', 200000)
                                ->orWhereNull('discount_price')
                                ->where('price', '<', 200000);
                            break;
                        case '200k_to_300k':
                            $subQuery->whereNotNull('discount_price')
                                ->whereBetween('discount_price', [200000, 300000])
                                ->orWhereNull('discount_price')
                                ->whereBetween('price', [200000, 300000]);
                            break;
                        case '300k_to_400k':
                            $subQuery->whereNotNull('discount_price')
                                ->whereBetween('discount_price', [300000, 400000])
                                ->orWhereNull('discount_price')
                                ->whereBetween('price', [300000, 400000]);
                            break;
                        case 'above_500k':
                            $subQuery->whereNotNull('discount_price')
                                ->where('discount_price', '>', 500000)
                                ->orWhereNull('discount_price')
                                ->where('price', '>', 500000);
                            break;
                    }
                });
            });
        }

        // Phân trang
        $products = $query->with('variants')->latest()->paginate(9);

        // Truyền biến category để tương thích với view
        $category = null;

        return view('client.pages.product-by-category', compact('products', 'promotions', 'categories', 'category'));
    }




    public function about()
    {

        $categories = Category::whereNull('parent_category_id')->where('is_active', 1)->get();
        return view('client.pages.about', compact('categories'));
    }


    public function product()
    {
        return view('client.pages.product');
    }


    public function productByCategory(Request $request)
    {
        $promotions = Promotion::where('is_active', 1)
            ->where('start_date', '<=', now()) // Ngày bắt đầu <= ngày hiện tại
            ->where('end_date', '>=', now()) // Ngày kết thúc >= ngày hiện tại
            ->get();
        $id = $request->query('id'); // Lấy ID danh mục từ query string (?id=1)

        if (!$id) {
            return redirect()->route('home')->with('error', 'Danh mục không hợp lệ.');
        }

        $category = Category::findOrFail($id);

        // Phân trang sản phẩm trong danh mục
        $products = Product::where('category_id', $id)
                   ->latest()
                   ->paginate(9);
        return view('client.pages.product-by-category', compact('category', 'products', 'promotions'));
    }




    public function productDetail($id)

    {
        $product = Product::find($id);


{
    $product = Product::find($id);

    if ($product) {


        $images = explode(',', $product->image);


        $category = Category::find($product->category_id);

        $colors = DB::table('product_variants')
            ->join('colors', 'product_variants.color_id', '=', 'colors.id')
            ->where('product_variants.product_id', $id)
            ->select('colors.id', 'colors.color_name', 'colors.color_code')
            ->distinct()
            ->get();

        $sizes = DB::table('product_variants')
            ->join('sizes', 'product_variants.size_id', '=', 'sizes.id')
            ->where('product_variants.product_id', $id)
            ->select('sizes.id', 'sizes.size_name')
            ->distinct()
            ->get();

        $comments = $product->comments()->get();

        // ✅ Thêm sản phẩm liên quan (cùng danh mục, loại trừ chính nó)
        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(8)
            ->get();

        // ✅ Lấy biến thể đầu tiên (ưu tiên còn hàng) để hiện trạng thái
        $defaultVariant = DB::table('product_variants')
            ->where('product_id', $product->id)
            ->orderByDesc('stock_quantity') // Ưu tiên biến thể còn hàng
            ->first();

        return view('client.pages.product-detail', compact(
            'product',
            'images',
            'category',
            'colors',
            'sizes',
            'comments',
            'relatedProducts',
            'defaultVariant' // ✅ truyền sang view
        ));
    }

    return redirect()->route('home')->with('error', 'Sản phẩm không tồn tại');
}

    }


    public function checkAvailability(Request $request)
    {
        $productId = $request->input('product_id');
        $colorId = $request->input('color_id');
        $sizeId = $request->input('size_id');

        // Kiểm tra xem biến thể sản phẩm có tồn tại không
        $variant = DB::table('product_variants')
            ->where('product_id', $productId)
            ->where('color_id', $colorId)
            ->where('size_id', $sizeId)
            ->first();

        if (!$variant) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sản phẩm không có màu sắc và size này!',
            ]);
        }

        // Lấy giá cũ, giá mới và số lượng tồn kho
        $oldPrice = $variant->price; // Giá gốc
        $newPrice = $variant->discount_price ?? $variant->price; // Giá khuyến mãi (nếu có)
        $stockQuantity = $variant->stock_quantity; // Số lượng tồn kho

        return response()->json([
            'status' => 'success',
            'old_price' => number_format($oldPrice, 0, ',', '.') . '₫',
            'new_price' => number_format($newPrice, 0, ',', '.') . '₫',
            'old_price_raw' => $oldPrice,
            'new_price_raw' => $newPrice,
            'stock_quantity' => $stockQuantity, // Trả về số lượng tồn kho
        ]);
    }
    

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Kiểm tra nếu có từ khóa tìm kiếm
        if (!$query) {
            return redirect()->route('home')->with('error', 'Vui lòng nhập từ khóa tìm kiếm.');
        }

        // Tìm kiếm sản phẩm
        $products = Product::where('name', 'LIKE', "%{$query}%")
                          ->orWhere('description', 'LIKE', "%{$query}%")
                          ->paginate(10); // Phân trang, mỗi trang 10 sản phẩm

        // Truyền dữ liệu sang View
        return view('client.pages.search', compact('products', 'query'));
    }

    public function post()
    {
        $posts = Post::where('is_active', true)->paginate(4); // Phân trang và chỉ lấy bài viết có trạng thái 'bật'

        return view('client.pages.post', compact('posts'));
    }

    public function postShow(Post $post)
    {
        $posts = Post::where('is_active', true)->paginate(4); // Thêm biến $posts
        return view('client.pages.post-detail', compact('post', 'posts'));
    }
    public function contact()
    {
        return view('client.pages.contact');
    }

    public function wishlist()
    {
        return view('client.pages.wishlist');
    }



    public function checkOrder()
    {
        return view('client.pages.check-order');
    }
    public function chinhSachGiaoHang()
    {
        return view('client.pages.chinh-sach-giao-hang');
    }

    public function login()
    {
        return view('auth.client.login');
    }

    /**
     * Xử lý đăng nhập
     */
    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công!');
            } elseif ($user->role === 'user') {
                return redirect()->route('profile')->with('success', 'Đăng nhập thành công!');
            }

            return redirect('/')->with('success', 'Đăng nhập thành công!');
        }

        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng.');
    }

    /**
     * Hiển thị trang đăng ký
     */
    public function register()
    {
        return view('auth.client.register');
    }

    /**
     * Xử lý đăng ký
     */
    public function doRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone, // Lưu số điện thoại
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        Auth::login($user);

        return redirect()->route('profile')->with('success', 'Đăng ký thành công!');
    }


    /**
     * Hiển thị trang đổi mật khẩu
     */


    /**
     * Xử lý đổi mật khẩu
     */
    public function doChangePassword(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'old_password' => 'required|min:8', // Tăng tối thiểu lên 8 ký tự để phù hợp với thông báo trong view
            'new_password' => 'required|min:8|confirmed', // Xác nhận mật khẩu mới
            'new_password_confirmation' => 'required|min:8', // Đảm bảo trường xác nhận cũng được validate
        ], [
            'old_password.required' => 'Mật khẩu cũ là bắt buộc.',
            'old_password.min' => 'Mật khẩu cũ phải có ít nhất 8 ký tự.',
            'new_password.required' => 'Mật khẩu mới là bắt buộc.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'new_password.confirmed' => 'Xác nhận mật khẩu mới không khớp.',
            'new_password_confirmation.required' => 'Xác nhận mật khẩu là bắt buộc.',
            'new_password_confirmation.min' => 'Xác nhận mật khẩu phải có ít nhất 8 ký tự.',
        ]);

        $user = Auth::user();

        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không chính xác.');
        }

        // Cập nhật mật khẩu mới
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        // Thêm thông báo thành công và logout để đảm bảo an toàn
        Auth::logout();
        return redirect()->route('login')->with('success', 'Mật khẩu đã được thay đổi. Vui lòng đăng nhập lại.');
    }

    /**
     * Đăng xuất
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Bạn đã đăng xuất.');
    }

    public function profile()
    {
        $user = Auth::user(); // Lấy thông tin người dùng đang đăng nhập
        return view('auth.client.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:10',
            'address' => 'required|string|max:500',
        ], [
            'name.required' => 'Họ và tên là bắt buộc.',
            'name.max' => 'Họ và tên không được vượt quá 255 ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã được sử dụng.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá 10 ký tự.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.max' => 'Địa chỉ không được vượt quá 500 ký tự.',
        ]);

        $user = Auth::user();

        // Cập nhật thông tin
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('profile')->with('success', 'Thông tin đã được cập nhật thành công.');
    }


    public function editProfile()
    {
        return view('auth.client.edit-profile', ['user' => Auth::user()]);
    }


    public function changePassword()
    {
        return view('auth.client.change-password');
    }

    public function order()
    {
        return view('client.pages.order');
    }

    public function address()
    {
        return view('client.pages.address');
    }
}
