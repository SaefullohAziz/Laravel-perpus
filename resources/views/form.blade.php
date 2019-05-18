@extends('layouts.app')

@section('title', 'Konfirmasi')
@section('content')
    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-10">
          <div class="card shadow mb-4" style="border-radius: 15px;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Konfirmasi peminjaman</h6>
            </div>
            <div class="card-body">
              <form action="{{ route('pinjam') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama Peminjam</label>
                  <input type="nama" class="form-control rounded-pill" name="nama_peminjam" id="nama" value="{{ $User }}" readonly>
                </div>
                <div class="form-group">
                  <fieldset disabled>
                    <label for="tanggalpinjam">Tanggal Pinjam</label>
                    <input type="text" class="form-control rounded-pill" name="tanggal_pinjam" id="tanggalpinjam" value="<?= date('m/d/Y'); ?>" disable>
                  </fieldset>
                </div>
                <div class="form-group">
                  <label for="buku">Nama Buku</label>
                    <select class="form-control rounded-pill" name="id_buku" id="buku" name="id_buku">
                      	<option value="{{ $Buku['id'] }}">{{ $Buku['nama_buku'] }}</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="tanggalkembali">Tanggal Kembali (Format : Bulan/Tanggal/Tahun)</label>
                  <input type="date" class="form-control rounded-pill" name="tanggal_kembali" id="tanggalkembali" value="<?= date('Y-m-d', time()+60*60*24*5); ?>">
                  <small class="form-text text-danger">*Setiap keterlambatan pengembalian di kenakan denda.</small>
                </div>
                <div class="text-right">
                  <a href="/home" class="btn btn-secondary px-5 rounded-pill">Kembali</a>
                  <button type="submit" class="btn btn-primary px-5 rounded-pill">Konfirmasi</button>
              </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
