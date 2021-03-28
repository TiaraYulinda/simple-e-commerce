<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'nama' => 'Light Stick BlackPink',
            'artist_id' => 2,
            'gambar' => 'lsbp.png'
        ]);

        DB::table('products')->insert([
            'nama' => 'Album - THE ALBUM',
            'artist_id' => 2,
            'gambar' => 'albumbp.png'
        ]);

        DB::table('products')->insert([
            'nama' => 'Light Stick - Army Bomb',
            'artist_id' => 1,
            'gambar' => 'lsbts.png'
        ]);

        DB::table('products')->insert([
            'nama' => 'BTS - BE',
            'artist_id' => 1,
            'gambar' => 'albumbts.png'
        ]);

        DB::table('products')->insert([
            'nama' => 'BTS - Map Of Soul',
            'artist_id' => 1,
            'gambar' => 'mapofsoul.png'
        ]);

        DB::table('products')->insert([
            'nama' => 'TXT Official Light Stick',
            'artist_id' => 3,
            'gambar' => 'lstxt.png'
        ]);

        DB::table('products')->insert([
            'nama' => 'TXT - The Dream Chapter: MAGIC',
            'artist_id' => 3,
            'gambar' => 'txtalbum.png'
        ]);

        DB::table('products')->insert([
            'nama' => 'TXT - STILL DREAMING',
            'artist_id' => 3,
            'gambar' => 'txtstilldreming.png'
        ]);

        DB::table('products')->insert([
            'nama' => 'Red Velvet Official Light Stick',
            'artist_id' => 4,
            'gambar' => 'lsredvelvet.png'
        ]);

        DB::table('products')->insert([
            'nama' => 'Red Velvet - Summer Magic',
            'artist_id' => 4,
            'gambar' => 'redvelvetalbum.png'
        ]);

        DB::table('products')->insert([
            'nama' => 'Red Velvet - SAPPY',
            'artist_id' => 4,
            'gambar' => 'sappy.png'
        ]);

        DB::table('products')->insert([
            'nama' => 'BLACKPINK - SQUARE UP',
            'artist_id' => 1,
            'gambar' => 'bpalbum.png'
        ]);
    }
}
