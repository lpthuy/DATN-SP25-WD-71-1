<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Tạo tài khoản admin
        User::create([
            'name' => 'admin',
            'email' => 'admin@gamil.com',
            'password' => Hash::make('quochieu'), // Mật khẩu mặc định
            'role' => 'admin', // Gán quyền admin
        ]);

        // Tạo tài khoản user
        User::create([
            'name' => 'user',
            'email' => 'user@gamil.com',
            'password' => Hash::make('quochieu'), // Mật khẩu mặc định
            'role' => 'user', // Gán quyền user
        ]);
    }
}

