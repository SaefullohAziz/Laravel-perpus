@extends('layouts.app')

@section('content')
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card shadow p-3"  style="border-radius: 15px;">
            <div class="card-body">
              <h5 class="card-title text-center">Riwayat peminjaman</h5>
              <hr>
              <ul class="list-group mt-5">
                @foreach ($Peminjaman as $pinjam)
                <li class="list-group-item d-flex justify-content-between align-items-center rounded-pill mb-2">
                  <span>
                    <span class="badge badge-dark badge-pill">{{ $pinjam['tanggal_pinjam'] }}</span>

                    {{ $pinjam['nama_buku'] }}
                  </span>

                  <span>
                    <?php if($pinjam['status'] == 'dikembalikan') : ?>
                      <span class="badge badge-success badge-pill">{{ $pinjam['status'] }}</span>

                    <?php elseif($pinjam['status'] == 'Pinjam' OR $pinjam['status'] == 'Diperpanjang') : ?>
                      <span class="badge badge-success badge-pill">{{ $pinjam['status'] }}</span>
                    <?php endif;?>

                  </li>
                  @endforeach
                  </span>
              </ul>
              {{ $Peminjaman->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection