<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        // Cari produk berdasarkan ID
        $product = Product::find($id);

        // Jika produk ditemukan, tambahkan ke session keranjang
        if ($product) {
            $cart = session('cart', []);

            // Cek apakah produk sudah ada di dalam keranjang
            $existingItem = collect($cart)->where('product_id', $product->id)->first();

            if ($existingItem) {
                // Jika produk sudah ada, tingkatkan jumlahnya
                $existingItem['quantity']++;
                $existingItem['subtotal'] = $existingItem['quantity'] * $product->price;
            } else {
                // Jika produk belum ada, tambahkan sebagai item baru
                $cartItem = [
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'subtotal' => $product->price,
                ];

                $cart[] = $cartItem;
            }

            session(['cart' => $cart]);
        }

        return redirect()->route('home')->with('success', 'Produk telah ditambahkan ke keranjang.');
    }
}
