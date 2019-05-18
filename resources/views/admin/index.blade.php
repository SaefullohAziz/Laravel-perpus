@extends('layouts.app')

@section('title', 'Peminjaman')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card shadow mb-4" style="border-radius: 15px;">

        <div class="card-header py-3">
          <h5 class="m-0 font-weight-bold text-primary">Data peminjaman</h5>
        </div>

        <div class="card-body px-1">
          @if (session('sukses'))
            <div class="alert alert-success" role="alert">
              {{ session('sukses') }}
            </div>
          @endif
          <div class="table-responsive">
            <table class="table" id="myTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama peminjam</th>
                  <th>Tanggal pinjam</th>
                  <th>Nama buku</th>
                  <th>Tanggal Kembali</th>
                  <th>Biaya</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                
                @foreach ($Peminjaman as $peminjam)
                    <tr>
                      <td><?= $no++; ?></td>
                      <td class="text-capitalize">{{ $peminjam['nama_peminjam'] }}</td>
                      <td>{{ $peminjam['tanggal_pinjam'] }}</td>
                      <td class="text-capitalize">{{ $peminjam['nama_buku'] }}</td>
                      <td>{{ $peminjam['tanggal_kembali'] }}</td>
                      <td>{{ $peminjam['biaya'] }}</td>
                      <td class="text-capitalize">{{ $peminjam['status'] }}</td>
                      <td>
                        <a href="/peminjaman/cek/<?= $peminjam['id']; ?>" class="btn btn-dark btn-sm <?php if ($peminjam['status'] == 'dikembalikan'): ?>
                          disabled
                        <?php endif ?>">Cek Denda</a>
                        <a href="/peminjaman/konfir/<?= $peminjam['id']; ?>" class="btn btn-success btn-sm <?php if ($peminjam['status'] == 'dikembalikan'): ?>
                          disabled
                        <?php endif ?>" >Konfirmasi</a>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
