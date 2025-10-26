<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public const DEFAULT_CURRENCY = 'VNĐ';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Xóa dữ liệu cũ
        Product::truncate();

        // Tạo 100 sản phẩm ngẫu nhiên
        for ($i = 1; $i <= 100; $i++) {
            Product::create([
                'category_id' => rand(1, 10), // Giả sử có 10 category
                'name' => 'Product ' . $i,
                'description' => 'Description for product number ' . $i,
                'price' => rand(10000, 100000), // Giá ngẫu nhiên
                'display_image_url' => 'https://picsum.photos/seed/' . $i . '/400/300',
                'currency' => self::DEFAULT_CURRENCY,
            ]);
        }
    }
}
