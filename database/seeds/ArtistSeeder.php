<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert([
            'nama' => 'BTS',
            'gambar' => 'bts.png',
        ]);

        DB::table('artists')->insert([
            'nama' => 'BLACKPINK',
            'gambar' => 'blackpink.png',
        ]);

        DB::table('artists')->insert([
            'nama' => 'TXT',
            'gambar' => 'txt.png',
        ]);

        DB::table('artists')->insert([
            'nama' => 'Red Velvet',
            'gambar' => 'redvelvet.png',
        ]);
    }
}
