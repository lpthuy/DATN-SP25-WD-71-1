<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class ShipperAuthController extends Controller
{
    // 🟢 Login cho shipper
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'errors' => $validator->errors()
            ], 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status'  => 'fail',
                'message' => 'Thông tin đăng nhập không chính xác!'
            ], 401);
        }

        $user = Auth::user();

        if ($user->role !== 'shipper') {
            return response()->json([
                'status'  => 'fail',
                'message' => 'Tài khoản không có quyền shipper'
            ], 403);
        }

        $token = $user->createToken('shipper-token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'user'   => $user,
            'token'  => $token,
        ]);
    }

    // 🔴 Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Đăng xuất thành công'
        ]);
    }

    // 👤 Thông tin shipper hiện tại
    public function profile(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'user'   => $request->user()
        ]);
    }


    public function register(Request $request)
    {
        // Ghi log để kiểm tra đầu vào
        Log::info('Register Request:', $request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => 'shipper',
        ]);

        $token = $user->createToken('shipper-token')->plainTextToken;

        return response()->json([
            'status'  => 'success',
            'message' => 'Đăng ký thành công!',
            'token'   => $token,
            'user'    => $user,
        ]);
    }
    
    

}
