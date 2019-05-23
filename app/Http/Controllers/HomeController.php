<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $peminjaman = Peminjaman::where('id_user', Auth::user()->id)
                        ->where('status', '!=', 'dikembalikan')
                        ->count();

        if ($peminjaman >= 1) {
            $peminjaman = Peminjaman::where('nama_peminjam', Auth::user()->name)->where('status', 'Pinjam')->orderBy('tanggal_kembali', 'asc')->orwhere('status', 'Diperpanjang')->get()->first();
            $tanggal_kembali = json_decode(json_encode($peminjaman), True)['tanggal_kembali'];
            $deadline = explode('-', $tanggal_kembali);
            $deadline = mktime(0, 0, 0, $deadline[1], $deadline[2], $deadline[0]);
            $sekarang = time();


            $buku = Buku::where('id', json_decode(json_encode($peminjaman), True)['id_buku'])->get()->first();
            $buku = json_decode(json_encode($buku), True)['nama_buku'];

            if ($deadline <= $sekarang) {
                session()->flash('danger', 'Masa pinjaman buku ' . 
                    $buku
                 . ' telah habis, segera kembalikan buku ke operator perpustakaan!');
            }
            elseif ($deadline <= ($sekarang+60*60*24*3)) {
                session()->flash('info', 'Pengembalian buku ' . 
                    $buku
                 . ' kurang dari tiga hari! (' . $tanggal_kembali . ')');
                session()->flash('id_peminjaman', $peminjaman = json_decode(json_encode($peminjaman), True)['id'] );
            }
        }


        return view('peminjam', ['User' => $user, 'Buku' => $Buku]);
    }

    public function form($id)
    {
        $user = Auth::user()->name;
        $Buku = Buku::where('id', $id)->first();

        return view('form', ['User' => $user, 'Buku' => $Buku]);
    }

    public function pinjam(Request $req)
    {
        $user = User::find(Auth::user()->id)->name;
        $id_user = Auth::user()->id;
        $data = [
            'id_user' => $id_user,
            'nama_peminjam' => $user,
            'tanggal_pinjam' => date('Y-m-d'),
            'id_buku' => $req['id_buku'],
            'tanggal_kembali' => $req['tanggal_kembali'],
            'biaya' => NULL,
            'status' => 'Pinjam'
        ];
        Peminjaman::create($data);
        return redirect('/home')->with('success', 'Peminjaman Dikonfirmasi, Harap kembalikan buku tepat waktu! Terima kasih :D');
    }

    public function cari(Request $key)
    {
        $cari = $key->key;

        $Buku = DB::table('buku')
                    ->where('nama_buku', 'like', "%".$cari."%")
                    ->orwhere('penulis', 'like', "%".$cari."%")
                    ->orwhere('penerbit', 'like', "%".$cari."%")
                    ->get();

        $user = User::find(Auth::user()->id);

        $peminjaman = Peminjaman::where('id_user', Auth::user()->id)
                        ->where('status', 'Pinjam')
                        ->count();

        $perpanjang = Peminjaman::where('id_user', Auth::user()->id)
                        ->where('status', 'Diperpanjang')
                        ->count();

        if (($peminjaman > 1) OR ($perpanjang > 1)) {
            $peminjaman = Peminjaman::where('nama_peminjam', Auth::user()->name)->where('status', 'Pinjam')->orderBy('tanggal_kembali', 'asc')->orwhere('status', 'Diperpanjang')->get()->first();
            $tanggal_kembali = json_decode(json_encode($peminjaman), True)['tanggal_kembali'];
            $deadline = explode('-', $tanggal_kembali);
            $deadline = mktime(0, 0, 0, $deadline[1], $deadline[2], $deadline[0]);
            $sekarang = time();

            $buku = Buku::where('id', json_decode(json_encode($peminjaman), True)['id'])->get()->first();
            $buku = json_decode(json_encode($buku), True)['nama_buku'];

            if ($deadline <= ($sekarang+60*60*24*3)) {
                session()->flash('info', 'Pengembalian buku ' . 
                    $buku
                 . ' kurang dari tiga hari! (' . $tanggal_kembali . ')');
                session()->flash('id_peminjaman', $peminjaman = json_decode(json_encode($peminjaman), True)['id'] );
            }
        }


        return view('peminjam', ['User' => $user, 'Buku' => $Buku]);
    }
}
