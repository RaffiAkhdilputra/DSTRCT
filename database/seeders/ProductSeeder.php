<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Shirts', 'Trousers', 'Shoes', 'Accessories'];
        $brands = ['Adidas', 'Nike', 'Puma', 'Reebok', 'Under Armour'];
        $tags = ['new-arrival', 'best-seller', 'on-discount'];
        $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
        $colors = ['Red', 'Blue', 'Black', 'White', 'Green'];

        for ($i = 1; $i <= 20; $i++) {
            $name = 'Product ' . $i;
            $defaultPrice = rand(100000, 500000);
            $discount = rand(0, 30); // dalam persen
            $price = (int) ($defaultPrice * (1 - $discount / 100));
            $currentRating = rand(1, 5);
            $totalRating = rand(5, 100);

            DB::table('product')->insert([
                'slug' => Str::slug($name),
                'name' => $name,
                'brand' => $brands[array_rand($brands)],
                'description' => 'This is a description for ' . $name. '. lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'default_price' => $defaultPrice,
                'price' => $price,
                'discount' => $discount,
                'front_image' => 'product-' . $i . '-front.jpg',
                'back_image' => 'product-' . $i . '-back.jpg',
                'current_rating' => $currentRating,
                'total_rating' => $totalRating,
                'category' => $categories[array_rand($categories)],
                'stock' => rand(0, 100),
                'available_sizes' => implode(',', (array) array_rand(array_flip($sizes), rand(1, 3))),
                'available_colors' => implode(',', (array) array_rand(array_flip($colors), rand(1, 3))),
                'is_active' => (bool) rand(0, 1),
                'tags' => $tags[array_rand($tags)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
