<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
        $categories = Category::where('is_active', 1)->get(); // Lấy danh mục đang hiển thị
        return view('client.pages.home');
    }

    public function about()
    {
        return view('client.pages.about');
    }

    public function product()
    {
        return view('client.pages.product');
    }

    public function productbycategory()
    {
        return view('client.pages.product-by-category');
    }

    public function productDetail()
    {
        return view('client.pages.product-detail');
    }

    public function post()
    {
        return view('client.pages.post');
    }

    public function contact()
    {
        return view('client.pages.contact');
    }

    public function search()
    {
        return view('client.pages.search');
    }

    public function wishlist()
    {
        return view('client.pages.wishlist');
    }

    public function cart()
    {
        return view('client.pages.cart');
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

    public function register()
    {
        return view('auth.client.register');
    }

    public function profile()
    {
        return view('auth.client.profile');
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
