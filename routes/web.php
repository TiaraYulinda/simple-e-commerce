<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::livewire('/', 'home')->name('home');
Route::livewire('/products', 'product-index')->name('products');
Route::livewire('/products/artist/{artistId}', 'product-artist')->name('products.artist');
Route::livewire('/products/{id}', 'product-detail')->name('products.detail');
Route::livewire('keranjang', 'keranjang-pesanan')->name('keranjang.pesanan');
Route::livewire('checkout', 'checkout')->name('checkout');
Route::livewire('history', 'history')->name('history');
