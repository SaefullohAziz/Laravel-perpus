@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col">
          <a href="/peminjaman/riwayat/{{ Auth::user()->id }}" class="btn btn-dark shadow btn-lg px-5 rounded-pill">Riwayat peminjaman</a>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-5">
            <form method="get" action="/home/cari">
              <div class="input-group mb-3">
                <input type="text" class="form-control rounded-pill" placeholder="Cari buku" aria-describedby="basic-addon2" name="key">
                <div class="input-group-append">
                  <button type="submit" class="input-group-text px-4 rounded-pill" id="basic-addon2">Cari</button>
                </div>
              </div>
            </form>
        </div>
      </div>
      <div class="row">
        @foreach ($Buku as $b)
          <div class="col-sm-6 my-2">
            <div class="card shadow" style="border-radius: 15px;">
              <div class="card-body">
                <h5 class="card-title text-center"> {{ $b->nama_buku }} ({{ $b->penulis }})</h5>
                <hr>
                <p class="card-text">Biaya pinjaman perhari Rp.0,-</p>
                <p class="card-text">Denda di tambahkan bila telat pengembalian = Rp.{{ $b->harga_buku }},-</p>
                <p class="card-text">Penerbit = Rp.{{ $b->penerbit }},-</p>
                <p class="card-text">Tahun terbit = Rp.{{ $b->tahun }},-</p>
                <div class="text-right">
                  <a href="peminjaman/form/{{ $b->id }}" class="btn btn-primary col-3 rounded-pill">Pinjam</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
@endsection