<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(['title' => 'Product 1', 'price' => 100]);
        Product::create(['title' => 'Product 2', 'price' => 200]);
        Product::create(['title' => 'Product 3', 'price' => 300]);
        Product::create(['title' => 'Product 4', 'price' => 400]);
        Product::create(['title' => 'Product 5', 'price' => 500]);
    }
}
