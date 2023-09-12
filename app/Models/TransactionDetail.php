<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';

    protected $fillable = [
        'document_code',
        'document_number',
        'product_code',
        'user',
        'price',
        'quantity',
        'unit',
        'sub_total',
        'currency',
    ];

    // Definisikan relasi dengan model lain jika diperlukan, misalnya dengan model Product atau User.
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_code', 'product_code');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'name');
    }

    public function header()
    {
        return $this->belongsTo(TransactionHeader::class, 'document_code', 'document_code');
    }
}
