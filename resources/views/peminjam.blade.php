@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        @foreach ($Buku as $b)
          <div class="col-sm-6 my-2">
            <div class="card shadow" style="border-radius: 15px;">
              <div class="card-body">
                <h5 class="card-title text-center"> {{ $b['nama_buku'] }} ({{ $b['penulis'] }})</h5>
                <hr>
                <p class="card-text">Biaya pinjaman perhari Rp.0,-</p>
                <p class="card-text">Denda di tambahkan bila telat pengembalian = Rp.{{ $b['harga_buku'] }},-</p>
                <p class="card-text">Penerbit = Rp.{{ $b['penerbit'] }},-</p>
                <p class="card-text">Tahun terbit = Rp.{{ $b['tahun'] }},-</p>
                <div class="text-right">
                  <a href="peminjaman/form/{{ $b['id'] }}" class="btn btn-primary text-center px-4 rounded-pill">Pinjam</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
@endsection