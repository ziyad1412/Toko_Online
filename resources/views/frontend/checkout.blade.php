@extends('frontend.layout.appfront')
@section('content')
    <div class="container">
        <h1>Checkout</h1>
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <!-- Form untuk alamat, nomor telepon, dll. -->

            <!-- Daftar produk yang akan dibeli -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <td>{{ $item['product_name'] }}</td>
                            <td>Rp. {{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>Rp. {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Process Checkout</button>
        </form>
    </div>
@endsection
