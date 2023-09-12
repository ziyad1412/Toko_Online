@extends('frontend.layout.appfront')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Kolom Pertama - Gambar Produk -->
                <img class="card-img-top w-100"
                    src="https://www.travelandleisure.com/thmb/KTIha5CLifSoUD3gx0YP51xc3rY=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg"
                    alt="Card image cap">
            </div>
            <div class="col-md-6">
                <!-- Kolom Kedua - Informasi Produk -->
                <div class="card">
                    <div class="card-header">
                        Detail Produk
                    </div>
                    <div class="card-body">
                        <h2>{{ $product->product_name }}</h2>
                        <p>Harga: Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p>Deskripsi: {{ $product->description }}</p>
                        <p>Stok: {{ $product->stock }}</p>
                        <!-- Tambahkan informasi produk lainnya sesuai kebutuhan -->
                        <a href="" class="btn btn-primary">Buy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
