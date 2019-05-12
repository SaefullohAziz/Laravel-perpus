<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Buku;
use App\Peminjaman;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $Buku = Buku::get();
        return view('peminjam', ['User' => $user, 'Buku' => $Buku]);
    }
    public function pinjam(Request $req)
    {
        $user = User::find(Auth::user()->id)->name;
        $data = [
            'nama_peminjam' => $user,
            'tanggal_pinjam' => date('Y-m-d'),
            'id_buku' => $req['id_buku'],
            'tanggal_kembali' => $req['tanggal_kembali'],
            'biaya' => NULL,
            'status' => 'Pinjam'
        ];
        Peminjaman::create($data);
        return redirect('/home')->with('sukses', 'Peminjaman Dikonfirmasi, Harap kembalikan buku tepat waktu! Terima kasih :D');
    }
}
