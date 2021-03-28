<div class="container">
    {{-- BANNER --}}
    <div class="banner">
        <img src="{{url('assets/slider/slider1.png')}}" alt="">
    </div>

    {{-- PILIH ARTIST --}}
    <section class="pilih-artist mt-4">
        <h3><strong>Pilih Artist</strong></h3>
        <div class="row mt-4">
            @foreach ($artists as $artist)
            <div class="col">
                <a href="{{ route('products.artist', $artist->id)}}">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <img src="{{ url('assets/artist') }}/{{$artist->gambar}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    {{-- PRODUCT --}}
    <section class="best-product mt-5 mb-5">
        <h3><strong>Products</strong>
            <a href="{{ route('products')}}" class="btn btn-dark float-right"><i class="fas fa-eye"></i> Lihat Semua</a>
        </h3>
            <div class="row mt-4">
            @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ url('assets/product') }}/{{$product->gambar}}" alt="" class="img-fluid">
                        
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong>{{ $product->nama }}</strong></h5>
                                <h5>Rp. {{ number_format($product->harga) }}</h5>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="{{ route('products.detail', $product->id)}}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i> Detail</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
