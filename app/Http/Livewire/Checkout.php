<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $total_harga, $nohp, $alamat;

    public function mount() //untuk mengambil data
    {
        //jika user tidak login
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        //variable = data di database
        $this->nohp = Auth::user()->nohp;
        $this->alamat = Auth::user()->alamat;

        //mengambil data pesanan
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (!empty($pesanan)) { //jika pesanan tidak kosong
            $this->total_harga = $pesanan->total_harga + $pesanan->kode_unik;
        } else { //jika kosong kembali ke home
            return redirect('home');
        }
    }

    public function checkout() //nama form di checkout
    {
        $this->validate([
            'nohp' => 'required',
            'alamat' => 'required',
        ]);

        //simpan no hp dan alamat
        $user = User::where('id', Auth::user()->id)->first();
        $user->nohp = $this->nohp;
        $user->alamat = $this->alamat;
        $user->update();

        //update data pesanan
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();

        $this->emit('masukKeranjang'); //untuk mengupdate isi keranjang
        session()->flash('message', "Checkout Telah Berhasil");
        return redirect('history');
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
