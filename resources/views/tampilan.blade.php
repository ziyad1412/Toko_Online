@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($produk as $key => $item)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top"
                            src="https://www.travelandleisure.com/thmb/KTIha5CLifSoUD3gx0YP51xc3rY=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg"
                            alt="Card image cap">
                        <div class="card-body" style="height:200px;">
                            <h2> <a href="/produk/{{ $item->id }}"
                                    class="text-decoration-none text-black">{{ $item->nama }}</a> </h2>
                            <h5 class="card-text" style=" height:40px; overflow: hidden;text-overflow: ellipsis">
                                Rp.{{ number_format($item->harga_jual, 0, ',', '.') }}</h5>
                            <a href="" class="btn btn-primary">Buy</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
