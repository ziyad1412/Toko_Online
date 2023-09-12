@extends('admin.layout.appadmin')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <h1>Edit Produk</h1>

    @foreach ($product as $p)
        <form method="POST" action="{{ url('product/update/' . $p->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="product_code" class="col-4 col-form-label">Product Code</label>
                <div class="col-8">
                    <input id="product_code" name="product_code" type="text" class="form-control"
                        value="{{ $p->product_code }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="product_name" class="col-4 col-form-label">Product Name</label>
                <div class="col-8">
                    <input id="product_name" name="product_name" type="text" class="form-control"
                        value="{{ $p->product_name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-4 col-form-label">Price</label>
                <div class="col-8">
                    <input id="price" name="price" type="text" class="form-control" value="{{ $p->price }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="currency" class="col-4 col-form-label">Currency</label>
                <div class="col-8">
                    <input id="currency" name="currency" type="text" class="form-control" value="{{ $p->currency }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="discount" class="col-4 col-form-label">Discount (%)</label>
                <div class="col-8">
                    <input id="discount" name="discount" type="text" class="form-control" value="{{ $p->discount }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="dimension" class="col-4 col-form-label">Dimension</label>
                <div class="col-8">
                    <input id="dimension" name="dimension" type="text" class="form-control" value="{{ $p->dimension }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="unit" class="col-4 col-form-label">Unit</label>
                <div class="col-8">
                    <input id="unit" name="unit" type="text" class="form-control" value="{{ $p->unit }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    @endforeach
@endsection
