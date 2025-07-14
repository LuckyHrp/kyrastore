<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create([
            'name' => 'Game',
            'slug' => 'game'
        ]);
        Category::create([
            'name' => 'Voucher',
            'slug' => 'voucher'
        ]);
        Category::create([
            'name' => 'Aplikasi',
            'slug' => 'aplikasi'
        ]);
        Category::create([
            'name' => 'Pulsa',
            'slug' => 'pulsa'
        ]);
    }
}
