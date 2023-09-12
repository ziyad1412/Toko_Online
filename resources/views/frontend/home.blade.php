@extends('frontend.layout.appfront')
@section('content')
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Selamat datang di toko online kami!</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Belanja dengan mudah dan nyaman.</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#produk"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Mulai Belanja</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('frontend/assets/img/hero-img.png') }}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-primary">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

    </section><!-- End Hero -->

    <div class="container footer d-flex align-items-center" id="produk">
        <div class="row justify-content-center">
            @foreach ($product as $p)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top"
                            src="https://www.travelandleisure.com/thmb/KTIha5CLifSoUD3gx0YP51xc3rY=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg"
                            alt="Card image cap">
                        <div class="card-body" style="height:200px;">
                            <h2> <a href="/product/{{ $p->id }}"
                                    class="text-decoration-none text-black">{{ $p->product_name }}</a> </h2>
                            <h5 class="card-text" style=" height:40px; overflow: hidden;text-overflow: ellipsis">
                                Rp.{{ number_format($p->price, 0, ',', '.') }}</h5>
                            <a href="{{ route('add_to_cart', $p->id) }}" class="btn btn-primary">Buy</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
