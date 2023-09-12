<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil data dari Transaction Detail
        $transactionDetail = TransactionDetail::where('document_code', 'TRX')->first();

        // Seeder Transaction Header
        TransactionHeader::create([
            'document_code' => 'TRX',
            'document_number' => '001',
            'user' => 'Ziyad',
            'total' => $transactionDetail->sub_total, // Total dari Transaction Detail
            'date' => now(), // Tanggal transaksi (bisa disesuaikan dengan tanggal yang sesuai)
        ]);
    }
}
