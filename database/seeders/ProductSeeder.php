<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Shirts', 'Trousers', 'Shoes', 'Accessories'];
        $tags = ['new-arival', 'best-seller', 'on-discount'];

        for ($i = 1; $i <= 20; $i++) {
            $defaultPrice = rand(100000, 500000);
            $discount = rand(0, 30); // dalam persen
            $price = (int) ($defaultPrice * (1 - $discount / 100));

            DB::table('product')->insert([
                'name' => 'Product ' . $i,
                'description' => 'Description for product ' . $i,
                'default_price' => $defaultPrice,
                'price' => $price,
                'discount' => $discount,
                'image' => 'product-' . $i . '.jpg',
                'current_rating' => rand(1, 5),
                'category' => $categories[array_rand($categories)],
                'stock' => rand(0, 100),
                'is_active' => (bool) rand(0, 1),
                'link' => 'https://example.com/product-' . $i,
                'tags' => $tags[array_rand($tags)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
