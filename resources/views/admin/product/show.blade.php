@extends('admin.layout.appadmin')
@section('content')
    <h1 class="mt-4">Detail Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('product') }}">Data Product</a></li>
        <li class="breadcrumb-item active">Detail Produk</li>
    </ol>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Product Code: {{ $product->product_code }}</h5>
            <h5 class="card-title">Product Name: {{ $product->product_name }}</h5>
            <p class="card-text">Price: {{ $product->price }}</p>
            <p class="card-text">Currency: {{ $product->currency }}</p>
            <p class="card-text">Discount (%): {{ $product->discount }}</p>
            <p class="card-text">Dimension: {{ $product->dimension }}</p>
            <p class="card-text">Unit: {{ $product->unit }}</p>
            <a href="{{ url('product/edit/' . $product->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ url('product/delete/' . $product->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Delete</button>
            </form>
        </div>
    </div>

    <a href="{{ url('product') }}" class="btn btn-secondary mb-4">Back to Products</a>
@endsection
