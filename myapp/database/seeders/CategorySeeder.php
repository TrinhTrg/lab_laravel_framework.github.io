<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    
    public function run(): void
    {

        // Tạo 1000 records tự động
        for ($i = 1; $i <= 1000; $i++) {
            Category::create([
                'name' => 'Category ' . $i,
                'description' => 'This is description for category number ' . $i,
            ]);
        }
    }
}
