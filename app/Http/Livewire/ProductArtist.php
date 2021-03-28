<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;
use App\Artist;
use Livewire\WithPagination;

class ProductArtist extends Component
{
    use WithPagination;

    public $search, $artist;
    protected $updateQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($artistId)
    {
        $artistDetail = Artist::find($artistId);

        if ($artistDetail) {
            $this->artist = $artistDetail;
        }
    }

    public function render()
    {
        if ($this->search) {
            $products = Product::where('artist_id', $this->artist->id)->where('nama', 'like', '%' . $this->search . '%')->paginate(8);
        } else {
            $products = Product::where('artist_id', $this->artist->id)->paginate(8);
        }

        return view('livewire.product-index', [
            'products' => $products,
            'title' => $this->artist->nama
            // 'title' => 'Product ' . $this->artist->nama
        ]);
    }
}
