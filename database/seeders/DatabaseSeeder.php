<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'tranhotrieu20122002@gmail.com',
                'password' => Hash::make('123456'), // Mật khẩu đã được mã hóa
                'avartar' => 'path/to/avatar.jpg', // Đường dẫn đến ảnh đại diện (nếu có)
                'cover_image' => 'path/to/cover_image.jpg', // Đường dẫn đến ảnh bìa (nếu có)
                'bio' => 'Hello! I am John Doe, a default user.',
                'email_verified_at' => now(), // Đánh dấu email đã được xác thực
                'created_at' => now(), // Thời gian tạo
                'updated_at' => now(), // Thời gian cập nhật
            ]
        ]);
    }
}
