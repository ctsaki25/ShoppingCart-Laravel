<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Apple iPhone 15',
            'price' => 1099.99,
            'description' => '5.4-inch display, A14 Bionic chip, dual-camera system'
        ]);

        Product::create([
            'name' => 'Samsung Galaxy S24 Ultra',
            'price' => 1299.99,
            'description' => '6.2-inch display, Exynos 2100, triple-camera system'
        ]);

        Product::create([
            'name' => 'Google Pixel 5a',
            'price' => 699.99,
            'description' => '6-inch display, Snapdragon 765G, excellent camera'
        ]);

        Product::create([
            'name' => 'OnePlus 12',
            'price' => 729.00,
            'description' => '6.55-inch display, Snapdragon 888, Hasselblad triple-camera system'
        ]);

        Product::create([
            'name' => 'Sony Xperia 1 II',
            'price' => 1199.99,
            'description' => '6.5-inch 4K HDR OLED, Snapdragon 865, triple-camera system'
        ]);

        Product::create([
            'name' => 'Xiaomi Mi 11',
            'price' => 749.99,
            'description' => '6.81-inch AMOLED DotDisplay, Snapdragon 888, triple-camera system'
        ]);

        Product::create([
            'name' => 'LG V60 ThinQ',
            'price' => 800.00,
            'description' => '6.8-inch display, Snapdragon 865, dual-screen option'
        ]);

        Product::create([
            'name' => 'Huawei P40 Pro',
            'price' => 900.00,
            'description' => '6.58-inch display, Kirin 990 5G, quad-camera system'
        ]);

        Product::create([
            'name' => 'iPhone SE (2020)',
            'price' => 399.99,
            'description' => '4.7-inch display, A13 Bionic, single camera system'
        ]);

        Product::create([
            'name' => 'Samsung Galaxy Note 20',
            'price' => 999.99,
            'description' => '6.7-inch display, Exynos 990, triple-camera system'
        ]);

        Product::create([
            'name' => 'Motorola Edge Plus',
            'price' => 999.99,
            'description' => '6.7-inch display, Snapdragon 865, triple-camera system'
        ]);

        Product::create([
            'name' => 'Nokia 8.3 5G',
            'price' => 699.00,
            'description' => '6.81-inch display, Snapdragon 765G, quad-camera setup'
        ]);

        Product::create([
            'name' => 'Oppo Find X2 Pro',
            'price' => 1200.00,
            'description' => '6.7-inch display, Snapdragon 865, triple-camera system'
        ]);

        Product::create([
            'name' => 'Asus ROG Phone 3',
            'price' => 999.99,
            'description' => '6.59-inch display, Snapdragon 865 Plus, triple-camera system, optimized for gaming'
        ]);
    }
}
