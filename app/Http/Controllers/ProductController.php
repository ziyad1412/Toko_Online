<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::getAllProduct();

        return view('admin.product.index', compact('product'));
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect('product')->with('error', 'Produk tidak ditemukan');
        }

        return view('admin.product.show', compact('product'));
    }


    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_code' => $product->product_code,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'currency' => $product->currency,
                'discount' => $product->discount,
                'dimension' => $product->dimension,
                'unit' => $product->unit,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function checkout()
    {
        // Dapatkan data keranjang dari sesi
        $cart = session('cart');

        // Buat transaksi baru di tabel transaction_headers
        $header = new TransactionHeader();
        $header->document_code = 'DOK-' . time(); // Misalnya, kode dokumen bisa menggunakan timestamp.
        $header->document_number = 'INV-' . time(); // Nomor dokumen bisa menggunakan timestamp.
        $header->user = auth()->user()->name; // Gunakan nama pengguna yang sesuai.
        $header->total = 0; // Inisialisasi total dengan nilai 0.
        $header->date = now(); // Gunakan tanggal saat ini.

        // Simpan header transaksi
        $header->save();

        // Simpan detail transaksi ke dalam tabel transaction_details
        foreach ($cart as $id => $details) {
            $transactionDetail = new TransactionDetail();
            $transactionDetail->document_code = $header->document_code;
            $transactionDetail->document_number = $header->document_number;
            $transactionDetail->product_code = $details['product_code'];
            $transactionDetail->user = auth()->user()->name;
            $transactionDetail->price = $details['price'];
            $transactionDetail->quantity = $details['quantity'];
            $transactionDetail->unit = $details['unit'];
            $transactionDetail->sub_total = $details['price'] * $details['quantity'];
            $transactionDetail->currency = $details['currency'];
            $transactionDetail->save();

            // Update total di transaction_headers
            $header->total += $transactionDetail->sub_total;
        }

        // Simpan total yang telah dihitung ke dalam transaction_headers
        $header->save();

        // Hapus data keranjang setelah checkout berhasil dilakukan
        session()->forget('cart');

        // Redirect ke halaman laporan penjualan atau halaman sukses checkout
        return redirect()->route('report.index')->with('success', 'Checkout berhasil');
    }


    public function showCheckout()
    {
        // Dapatkan data keranjang dari sesi
        $cart = session('cart');

        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        session()->put('cart', []);

        return view('checkout', compact('cart', 'total'));
    }

    public function report()
    {
        // Ambil data laporan penjualan dari transaction_headers
        $transactionHeaders = TransactionHeader::all(); // Sesuaikan dengan logika laporan penjualan Anda.

        // Kirim data ke tampilan laporan penjualan
        return view('report', compact('transactionHeaders'));
    }



    public function create()
    {
        $product = Product::getAllProduct();

        return view('admin.product.index', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required|string|max:18',
            'product_name' => 'required|string|max:30',
            'price' => 'required|numeric',
            'currency' => 'required|string|max:5',
            'discount' => 'required|numeric',
            'dimension' => 'required|string|max:50',
            'unit' => 'required|string|max:5',
        ]);

        $product = new Product;
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->currency = $request->currency;
        $product->discount = $request->discount;
        $product->dimension = $request->dimension;
        $product->unit = $request->unit;
        $product->save();

        return redirect('product')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->get();

        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_code' => 'required|string|max:18',
            'product_name' => 'required|string|max:30',
            'price' => 'required|numeric',
            'currency' => 'required|string|max:5',
            'discount' => 'required|numeric',
            'dimension' => 'required|string|max:50',
            'unit' => 'required|string|max:5',
        ]);

        $product = Product::find($id);
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->currency = $request->currency;
        $product->discount = $request->discount;
        $product->dimension = $request->dimension;
        $product->unit = $request->unit;
        $product->save();

        return redirect('product')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('product')->with('success', 'Produk berhasil dihapus');
    }
}
