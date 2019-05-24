<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        $Peminjaman = Peminjaman::select('peminjaman.*', 'buku.nama_buku')
                        ->join('buku', 'peminjaman.id_buku', '=' , 'buku.id')
                        ->orderBy('status', 'desc')
                        ->get()->all();

        
        return view('admin.index', ['Peminjaman' => $Peminjaman]);
    }

    public function cek($id)
    {
        $tanggal_kembali = DB::table('peminjaman')
                            ->select(['tanggal_kembali', 'id_buku'])
                            ->where('id', $id)
                            ->get();


        $id_buku = json_decode(json_encode($tanggal_kembali), True)[0]['id_buku'];
        $harga_buku = DB::table('buku')
                            ->select('harga_buku')
                            ->where('id', $id_buku)
                            ->get();
        $harga_buku = json_decode(json_encode($harga_buku), True)[0]['harga_buku'];

        $tanggal_kembali = json_decode(json_encode($tanggal_kembali), True)[0]['tanggal_kembali'];
        $tanggal_kembali = explode('-', $tanggal_kembali);
        $tanggal_kembali = mktime(0, 0, 16, $tanggal_kembali[1], $tanggal_kembali[2], $tanggal_kembali[0]);
        $sekarang = time();

        if ($sekarang > $tanggal_kembali ) {
            if ($sekarang > ($tanggal_kembali+60*60*24*7)) {
                DB::table('peminjaman')
                    ->where('id', $id)
                    ->update(['biaya' => $harga_buku*2]);
                return redirect('/peminjaman')->with('success','Pengembalian telat lebih dari atau sama dengan satu, biaya denda double ditambahkan!');
            }
            else
            {
                DB::table('peminjaman')
                    ->where('id', $id)
                    ->update(['biaya' => $harga_buku]);
                return redirect('/peminjaman')->with('success','Pengembalian telat kurang dari satu minggu, biaya normal denda ditambahkan!');
            }
        }
        else
        {
            DB::table('peminjaman')
                    ->where('id', $id)
                    ->update(['biaya' => 0]);
            return redirect('/peminjaman')->with('success','Pengembalian dilakukan sebelum atau tepat pada waktu yang di tentukan, biaya denda tidak ditambahkan!');
        }
    }

    public function konfir($id)
    {
        $status = ['status' => 'dikembalikan'];
        $u = Peminjaman::find($id)->update($status);
        return redirect('/peminjaman')->with('success','Pengembalian berhasil dikonfirmasi!');
    }

    public function perpanjangan($id)
    {
        $status = Peminjaman::where('id', $id)->where('status', 'Pinjam')->count();
        if ($status == 1) {
            DB::table('peminjaman')
                ->where('id', $id)
                ->update(['status' => 'Diperpanjang',
                         'tanggal_kembali' => date('Y-m-d', time()+60*60*24*5)]);
            session()->flash('success','Perpanjangan berhasil dikonfirmasi, Lakukan pengembalian setelah lima hari!');
            return redirect('/home');
        }

        return redirect('/home')->with('danger','Perpanjangan gagal dikonfirmasi, perpanjangan hanya bisa dilakukan satu kali!');
    }

    public function riwayat()
    {
        $Peminjaman = Peminjaman::
                     join('buku', 'peminjaman.id_buku', '=' , 'buku.id')
                    ->orderBy('status', 'desc')
                    ->where('id_user', Auth::user()->id)
                    ->paginate(10);
        return view('riwayat', ['Peminjaman' => $Peminjaman]);
    }
}
