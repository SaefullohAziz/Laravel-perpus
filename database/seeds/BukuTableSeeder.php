<?php

use Illuminate\Database\Seeder;
use App\Buku;

class BukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buku::create([
        	'nama_buku' => 'Teknologi informasi',
        	'harga_buku' => 50000,
            'penulis' => 'joe philips',
            'penerbit' => 'Gramedia',
            'tahun' => 2019
        ]);

        Buku::create([
            'nama_buku' => 'Cara cepat bisa BLENDER',
            'harga_buku' => 150000,
            'penulis' => 'joe whillie',
            'penerbit' => 'Gramedia',
            'tahun' => 2018
        ]);
    }
}
