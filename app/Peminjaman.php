<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = [
    	'id_user', 'nama_peminjam','id_buku','tanggal_pinjam',
    	'tanggal_kembali','biaya','status'
    ];
}
