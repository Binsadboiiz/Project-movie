<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tạo tài khoản admin
        User::create([
            'name' => 'Admin', // Tên tài khoản
            'email' => 'admin@example.com', // Email tài khoản
            'password' => bcrypt('Admin123456'), // Mật khẩu (được mã hóa)
            'role' => 'admin', // Vai trò admin
        ]);

        // Tạo tài khoản người dùng thử nghiệm (nếu cần)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
