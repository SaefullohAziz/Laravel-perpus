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
        	'harga_buku' => 50000
        ]);

        Buku::create([
            'nama_buku' => 'Cara cepat bisa BLENDER',
            'harga_buku' => 150000
        ]);
    }
}
