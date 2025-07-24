<?php

namespace Database\Seeders;

use App\Models\Nominal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NominalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nominal::create([
            'product_id' => 1,
            'name' => '5 Diamond ML',
            'code' => '5MLBB',
            'image' => 'nominals/default.png',
            'price' => 2000,
        ]);
    }
}
