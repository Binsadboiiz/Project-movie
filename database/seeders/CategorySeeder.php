<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Hành động'],
            ['name' => 'Lãng mạn'],
            ['name' => 'Kinh dị'],
            ['name' => 'Hài hước'],
            ['name' => 'Khoa học viễn tưởng'],
            ['name' => 'Tâm lý'],
            ['name' => 'Gia đình'],
            ['name' => 'Phiêu lưu'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
