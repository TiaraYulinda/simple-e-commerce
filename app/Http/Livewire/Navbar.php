<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Artist;
use App\Pesanan;
use App\PesananDetail;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    //buat variable untuk jumlah pesanan keranjang
    public $jumlah = 0;

    //lanjutan dari emit di controller product detail
    protected $listeners = [
        'masukKeranjang' => 'updateKeranjang'
    ];

    public function updateKeranjang()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

            //jika ada pesanan update variable jumlah sesuah dengan pesanan detail dengan pesanan_id yang sama
            if ($pesanan) {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            } else {
                $this->jumlah = 0;
            }
        }
    }


    public function mount()
    {
        //jika user sudah login
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

            //jika ada pesanan update variable jumlah sesuah dengan pesanan detail dengan pesanan_id yang sama
            if ($pesanan) {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            } else {
                $this->jumlah = 0;
            }
        }
    }

    public function render()
    {
        return view('livewire.navbar', [
            'artists' => Artist::all(),
            'jumlah_pesanan' => $this->jumlah,
        ]);
    }
}
