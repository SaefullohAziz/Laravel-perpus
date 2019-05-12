<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        $Peminjaman = Peminjaman::get()->all();
        return view('admin.index', ['Peminjaman' => $Peminjaman]);
    }

    public function cek($id)
    {
        $tanggal_kembali = DB::table('peminjaman')->select('tanggal_kembali')->where('id', $id)->get()->all();
        $tanggal_kembali = json_decode(json_encode($tanggal_kembali), True)[0]['tanggal_kembali'];
        $tanggal_kembali = explode('-', $tanggal_kembali);
        $tanggal_kembali = mktime(0, 0, 0, $tanggal_kembali[1], $tanggal_kembali[2], $tanggal_kembali[0]);
        $sekarang = time();

        if ($sekarang > $tanggal_kembali ) {
            if ($sekarang > ($tanggal_kembali+60*60*24*3)) {
                DB::table('peminjaman')
                    ->where('id', $id)
                    ->update(['biaya' => 15000]);
                return redirect('/peminjaman')->with('sukses','Pemgembalian telat lebih dari atau sama dengan tiga hari, biaya denda ditambahkan!');
            }
            elseif ($sekarang > ($tanggal_kembali+60*60*24*2)) {
                DB::table('peminjaman')
                    ->where('id', $id)
                    ->update(['biaya' => 10000]);
                return redirect('/peminjaman')->with('sukses','Pemgembalian telat  dua hari, biaya denda ditambahkan!');
            }
            elseif ($sekarang > ($tanggal_kembali+60*60*24))
            {
                DB::table('peminjaman')
                    ->where('id', $id)
                    ->update(['biaya' => 5000]);
                return redirect('/peminjaman')->with('sukses','Pemgembalian telat  satu hari, biaya denda ditambahkan!');
            }
        }
        else
        {
            DB::table('peminjaman')
                    ->where('id', $id)
                    ->update(['biaya' => 0]);
            return redirect('/peminjaman')->with('sukses','Pengembalian dilakukan sebelum atau tepat pada waktu yang di tentukan, biaya denda tidak ditambahkan!');
        }
    }

    public function konfir($id)
    {
        $status = ['status' => 'dikembalikan'];
        $u = Peminjaman::find($id)->update($status);
        return redirect('/peminjaman')->with('sukses','Pengembalian berhasil dikonfirmasi!');
    }
}
