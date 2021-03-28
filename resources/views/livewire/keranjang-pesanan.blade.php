<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-danger" role="alert">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Gambar</td>
                            <td>Keterangan</td>
                            <td>Sign</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <td>Total Harga</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- untuk nomer --}}
                        @php
                            $no =1 
                        @endphp
                        {{-- karna ada data kosong jadi pakai forelse --}}
                        @forelse ($pesanan_details as $pesanan_detail)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ url('assets/product') }}/{{$pesanan_detail->product->gambar}}" alt="" class="img-fluid" width="150">
                            </td>
                            <td>{{ $pesanan_detail->product->nama}}</td>
                            <td>
                                {{-- jika sign bernilai true (1) maka --}}
                                @if ($pesanan_detail->sign)
                                    To. {{ $pesanan_detail->nama_to }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $pesanan_detail->jumlah_pesanan }}</td>
                            <td>Rp. {{ number_format($pesanan_detail->product->harga) }}</td>
                            <td><strong>Rp. {{ number_format($pesanan_detail->total_harga) }}</strong></td>
                            <td>
                                {{-- pada keranjang controller --}}
                                <i wire:click="destroy({{ $pesanan_detail->id}})" class="fas fa-trash text-danger"></i>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse
                        {{-- jika pesanan tidak kodong maka --}}
                        @if (!empty($pesanan))
                            <tr>
                                <td colspan="6" align="right"><strong>Total Harga : </strong></td>
                                <td align="right"><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" align="right"><strong>Kode Unik : </strong></td>
                                <td align="right"><strong>Rp. {{ number_format($pesanan->kode_unik) }}</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" align="right"><strong>Harus dibayar : </strong></td>
                                <td align="right"><strong>Rp. {{ number_format($pesanan->total_harga+$pesanan->kode_unik) }}</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                                <td colspan="2">
                                    <a href="{{ route('checkout')}}" class="btn btn-success btn-blok">
                                        <i class="fas fa-arrow-right"></i> Check Out
                                    </a>
                                </td>
                                <td></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
