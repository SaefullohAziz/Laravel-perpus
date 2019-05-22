<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
use App\Buku;
use App\Peminjaman;

class BukuController extends Controller
{
    public function index()
    {
    	return view('buku.index', ['Buku' => Buku::get()]);
    }

    public function create(Request $req)
    {
    	Buku::create([
            'nama_buku' => $req['buku'],
            'harga_buku' => $req['harga'],
            'penulis' => $req['penulis'],
            'penerbit' => $req['penerbit'],
            'tahun' => $req['tahun']
    	]);
    	return redirect('/buku')->with('success', 'Buku baru ditambahkan');
    }

    public function edit($id)
    {
    	$Buku = Buku::find($id);
    	return view('buku.edit', ['Buku' => $Buku]);
    }

    public function update(Request $req)
    {
    	DB::table('buku')->where('id', $req->id)
                         ->update(
                                    ['nama_buku' => $req->nama_buku,
                                    'harga_buku' => $req->harga_buku,
                                    'penulis' => $req->penulis,
                                    'penerbit' => $req->penerbit,
                                    'tahun' => $req->tahun]
                            );
    	return redirect('/buku')->with('success', 'Buku diedit');
    }

    public function destroy($id)
    {
        // $status = Peminjaman::where('id_buku', $id)->where('status', '!=', 'dikembalikan')->count();
        // if ($status > 0) {
        //     return redirect('/buku')->with('danger', 'Buku masih dalam peminjaman');
        // }
    	Buku::destroy($id);
    	return redirect('/buku')->with('success', 'Buku dihapus');
    }
}
