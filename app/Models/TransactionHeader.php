<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    protected $table = 'transaction_headers';
    protected $fillable = ['document_code', 'document_number', 'user', 'total', 'date'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'name');
    }

    // Definisikan relasi dengan model TransactionDetail
    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'document_code', 'document_code');
    }
}
