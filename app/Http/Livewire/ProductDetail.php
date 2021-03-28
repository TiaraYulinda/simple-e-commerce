<?php

namespace App\Http\Livewire;

use App\Product;
use App\Pesanan;
use App\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product, $tanda_tangan, $jumlah_pesanan;

    public function mount($id)
    {
        $productDetail = Product::find($id);

        if ($productDetail) {
            $this->product = $productDetail;
        }
    }

    public function masukkanKeranjang()
    {
        // dd('masuk');
        $this->validate([
            'jumlah_pesanan' => 'required'
        ]);

        //jika blm login
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        //menghitung total harga
        if (!empty($this->tanda_tangan)) {
            $total_harga = $this->jumlah_pesanan * $this->product->harga + $this->product->harga_sign;
        } else {
            $total_harga = $this->jumlah_pesanan * $this->product->harga;
        }

        // dd($total_harga);
        //cek apakah user punya pesanan utama dengan status 0
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        // dd($pesanan->id);
        //menyimpan / mengupdate pesanan utama
        if (empty($pesanan)) {
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999) //fungsi dari php
            ]);

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->kode_pesanan = 'MV-' . $pesanan->id;
            $pesanan->update();
        } else {
            $pesanan->total_harga = $pesanan->total_harga + $total_harga;
            $pesanan->update();
        }

        //menyimpan pesanan detail
        PesananDetail::create([
            'product_id' => $this->product->id,
            'pesanan_id' => $pesanan->id,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'sign' => $this->tanda_tangan ? true : false,
            'nama_to' => $this->tanda_tangan,
            'total_harga' => $total_harga,
        ]);

        $this->emit('masukKeranjang'); //untuk notif tambah belanja di keranjang secara realtime, di tangkap pada controller navbar

        //session untuk di product detail
        session()->flash('message', 'Sukses Masuk Keranjang');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
