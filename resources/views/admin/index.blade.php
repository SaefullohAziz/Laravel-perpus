@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Data peminjaman</h6>
                    </div>
                    <div class="card-body px-0">
                      @if (session('sukses'))
                        <div class="alert alert-success" role="alert">
                          {{ session('sukses') }}
                        </div>
                      @endif
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                  <td>{{ $peminjam['nama_peminjam'] }}</td>
                                  <td>{{ $peminjam['tanggal_pinjam'] }}</td>
                                  <td>{{ $peminjam['id_buku'] }}</td>
                                  <td>{{ $peminjam['tanggal_kembali'] }}</td>
                                  <td>{{ $peminjam['biaya'] }}</td>
                                  <td>{{ $peminjam['status'] }}</td>
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
@endsection
