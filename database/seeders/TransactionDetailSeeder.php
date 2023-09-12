<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\TransactionDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil data produk dengan kode tertentu
        $product = Product::where('product_code', 'SKUSKILNP')->first();
        // Hitung harga setelah diskon
        $discountedPrice = $product->price - ($product->price * 0.10);
        // Contoh data TransactionDetail
        TransactionDetail::create([
            'document_code' => 'TRX',
            'document_number' => '001',
            'product_code' => 'SKUSKILNP',
            'user' => 'Ziyad',
            'price' => $discountedPrice,
            'quantity' => 5,
            'sub_total' => $discountedPrice * 5,
            'currency' => 'IDR',
        ]);

        $product2 = Product::where('product_code', 'DD001')->first();
        $discountedPrice2 = $product2->price - ($product2->price * 0.05);

        TransactionDetail::create([
            'document_code' => 'TRX',
            'document_number' => '002',
            'product_code' => 'DD001',
            'user' => 'Ziyad',
            'price' => $discountedPrice2,
            'quantity' => 2,
            'unit' => 'PCS',
            'sub_total' => $discountedPrice2 * 2,
            'currency' => 'IDR',
        ]);
    }
}
