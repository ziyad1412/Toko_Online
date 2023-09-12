<?php

namespace Database\Seeders;

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
        // Contoh data TransactionDetail
        TransactionDetail::create([
            'document_code' => 'TRX',
            'document_number' => '001',
            'product_code' => 'SKUSKILNP',
            'user' => 'Ziyad',
            'price' => 15000,
            'quantity' => 5,
            'sub_total' => 67500,
            'currency' => 'IDR',
        ]);
    }
}
