<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products')}}" class="text-dark">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card gambar-product">
                <div class="card-body">
                    <img src="{{ url('assets/product') }}/{{$product->gambar}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>
                <strong>{{ $product->nama }}</strong>
            </h2>
            <h4>
                Rp. {{ number_format($product->harga)}}
                @if ($product->is_ready == 1)
                    <span class="badge bg-success"><i class="fas fa-check"></i>Ready Stok</span>
                @else
                    <span class="badge bg-danger"><i class="fas fa-times"></i>Stok Habis</span>
                @endif
            </h4>
            <hr>
            <div class="row">
                <div class="col">
                    <form action="" wire:submit.prevent="masukkanKeranjang">
                        <table class="table" style="border-top: hidden">
                            <tr>
                                <td>Artist</td>
                                <td>:</td>
                                <td><img src="{{ url('assets/artist') }}/{{$product->artist->gambar}}" alt="" class="img-fluid" width="50">
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td>:</td>
                                <td>{{$product->jenis}}</td>
                            </tr>
                            <tr>
                                <td>Berat</td>
                                <td>:</td>
                                <td>{{$product->berat}}</td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td><input id="jumlah_pesanan" type="number" class="form-control @error('jumlah_pesanan') is-invalid @enderror" wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required autocomplete="jumlah_pesanan" autofocus>

                                    @error('jumlah_pesanan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            @if ($jumlah_pesanan > 1)
                            @else
                            <tr>
                                <td colspan="3"><strong>Tanda Tangan Member</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Harga tanda tangan</td>
                                <td>:</td>
                                <td>Rp. {{number_format($product->harga_sign)}}</td>
                            </tr>
                            <tr>
                                <td>To (Nama)</td>
                                <td>:</td>
                                <td><input id="tanda_tangan" type="text" class="form-control @error('tanda_tangan') is-invalid @enderror" wire:model="tanda_tangan" value="{{ old('tanda_tangan') }}" autocomplete="tanda_tangan" autofocus>

                                    @error('tanda_tangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-dark btn-block" @if($product->is_ready !== 1) disabled @endif><i class="fas fa-shopping-cart"></i> Masukkan Keranjang</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
