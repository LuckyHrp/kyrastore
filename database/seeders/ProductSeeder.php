<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $category = Category::where('slug', 'game')->first();

        Product::create([
            'name' => 'Mobile Legends',
            'slug' => 'mobile-legends',
            'category_id' => $category->id,
            'image' => '/products/mobile-legends.png',
            'description' => 'mobile legend',
        ]);
    }
}
