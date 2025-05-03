<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        // Yêu cầu đăng nhập và kiểm tra vai trò admin
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!auth()->user()->isAdmin()) {
                abort(403, 'Unauthorized');
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::with('orders')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified user.
     */
    public function show($id)
    {
        $user = User::with('orders')->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Toggle the active status of the user.
     */
    public function toggleActive($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();
        $status = $user->is_active ? 'kích hoạt' : 'ẩn';
        return redirect()->route('user.index')->with('success', "Tài khoản đã được $status");
    }
}