<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Matikan foreign key check sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate semua yang berelasi agar bersih
        DB::table('order_product')->truncate();
        DB::table('products')->truncate();
        DB::table('categories')->truncate();

        // Aktifkan kembali
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insert kategori
        $category1 = Category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',
        ]);

        $category2 = Category::create([
            'name' => 'Perabotan Rumah',
            'slug' => 'perabotan-rumah',
        ]);

        // Insert produk
        Product::create([
            'name'        => 'Samsung S25 5G',
            'slug'        => 'samsung-s25-5g',
            'category_id' => $category1->id,
            'description' => 'Lorem Ipsum',
            'image'       => 'image.png',
            'price'       => 2400000,
            'stock'       => 100,
        ]);

        Product::create([
            'name'        => 'Sapu Lidi',
            'slug'        => 'sapu-lidi',
            'category_id' => $category2->id,
            'description' => 'Lorem Ipsum',
            'image'       => 'image.png',
            'price'       => 5000,
            'stock'       => 1000,
        ]);
    }
}
