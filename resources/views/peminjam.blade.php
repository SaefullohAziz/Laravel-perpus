@extends('layouts.app')

@section('content')
    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-10">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Formulir peminjaman</h6>
            </div>
            <div class="card-body">
              @if (session('sukses'))
                <div class="alert alert-success" role="alert">
                  {{ session('sukses') }}
                </div>
              @endif
              <form action="{{ route('pinjam') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama Peminjam</label>
                  <input type="nama" class="form-control" name="nama_peminjam" id="nama" value="{{ $User['name'] }}" readonly>
                </div>
                <div class="form-group">
                  <fieldset disabled>
                    <label for="tanggalpinjam">Tanggal Pinjam</label>
                    <input type="text" class="form-control" name="tanggal_pinjam" id="tanggalpinjam" value="<?= date('m/d/Y'); ?>" disable>
                  </fieldset>
                </div>
                <div class="form-group">
                  <label for="buku">Nama Buku</label>
                  <select class="form-control" name="id_buku" id="buku" name="id_buku">
                    <option value="NULL">-->Pilih Buku<--</option>
                    @foreach ($Buku as $b)
                    	<option value="{{ $b['id'] }}">{{ $b['nama_buku'] }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="tanggalkembali">Tanggal Kembali (Format : Bulan:Tanggal:Tahun)</label>
                  <input type="date" class="form-control" name="tanggal_kembali" id="tanggalkembali" value="<?= date('Y-m-d'); ?>">
                  <small class="form-text text-danger">*Setiap keterlambatan pengembalian di kenakan denda.</small>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary px-5 col-sm-10 col-lg-4">Pinjam</button>
              </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
