<?php

namespace Database\Seeders;

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
        Product::create([
            'product_code' => 'SKUSKILNP',
            'product_name' => 'So klin Pewangi',
            'price' => 15000,
            'currency' => 'IDR',
            'discount' => 10.00,
            'dimension' => '13 cm x 10 cm',
            'unit' => 'PCS',
        ]);

        Product::create([
            'product_code' => 'DD001',
            'product_name' => 'Daia Deterjen',
            'price' => 20000,
            'currency' => 'IDR',
            'discount' => 5.00,
            'dimension' => '15 cm x 12 cm',
            'unit' => 'PCS',
        ]);

        Product::create([
            'product_code' => 'GS002',
            'product_name' => 'Giv Sabun',
            'price' => 25000,
            'currency' => 'IDR',
            'discount' => 15.00,
            'dimension' => '18 cm x 14 cm',
            'unit' => 'PCS',
        ]);

        Product::create([
            'product_code' => 'NS003',
            'product_name' => 'Nuvo Sabun',
            'price' => 18000,
            'currency' => 'IDR',
            'discount' => 8.00,
            'dimension' => '12 cm x 9 cm',
            'unit' => 'PCS',
        ]);

        Product::create([
            'product_code' => 'PP001',
            'product_name' => 'Protex Pembalut',
            'price' => 30000,
            'currency' => 'IDR',
            'discount' => 20.00,
            'dimension' => '20 cm x 16 cm',
            'unit' => 'PCS',
        ]);
    }
}
