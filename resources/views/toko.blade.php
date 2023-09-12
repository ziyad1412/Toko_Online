@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="text-center mb-3">List Product</h2>
        @foreach ($product as $p)
            <div class="row justify-content-center">
                <div class="col-12 mb-4">
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                        <img src="https://www.travelandleisure.com/thmb/KTIha5CLifSoUD3gx0YP51xc3rY=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg"
                                            class="w-100" />
                                        <a href="#!">
                                            <div class="hover-overlay">
                                                <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <h5 class="pt-3"><a href="/product/{{ $p->id }}"
                                            class="text-decoration-none text-black">{{ $p->product_name }}</a></h5>
                                    <div class="align-items-center mt-4">
                                        <span class="text-danger pt-2"><s>Rp
                                                {{ number_format($p->price, 0, ',', '.') }}</s></span>
                                        <h4 class="mb-1 me-1">
                                            Rp {{ number_format($p->price - $p->price / $p->discount, 0, ',', '.') }}</h4>
                                    </div>

                                </div>
                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                    <div class="d-flex flex-column mt-4">
                                        <a href="{{ route('add_to_cart', $p->id) }}" class="btn btn-primary mt-4">Buy</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
@endsection
