<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Nama tabel di database

    public $timestamps = false;

    protected $fillable = [
        'product_code',
        'product_name',
        'price',
        'currency',
        'discount',
        'dimension',
        'unit',
    ];

    public static function getAllProduct()
    {
        $alldata = self::all(); // Menggunakan Eloquent untuk mengambil semua data
        return $alldata;
    }
}
