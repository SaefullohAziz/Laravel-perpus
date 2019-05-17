<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Buku;

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
            'harga_buku' => $req['harga']
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
                                ['nama_buku' => $req->nama_buku],
                                ['harga_buku' => $req->harga_buku]
                            );
    	return redirect('/buku')->with('success', 'Buku diedit');
    }

    public function destroy($id)
    {
    	Buku::destroy($id);
    	return redirect('/buku')->with('success', 'Buku baru ditambahkan');
    }
}
