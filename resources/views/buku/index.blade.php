@extends('layouts.app')

@section('title', 'Buku')
@section('content')
<div class="container mt-5 pt-5">
  <div class="row justify-content-center">
    <div class="col-sm-10 col-md-10">
      <div class="card shadow"  style="border-radius: 15px;">
        <div class="card-header">
        	<div class="d-flex justify-content-between">
            <h5 class="card-title text-primary">Table buku</h5>
            <!-- Button trigger modal -->
  						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBuku">
  						  +
		          </button>
          </div>
        </div>

        <div class="card-body px-1 pb-1">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif

          <div class="table-responsive">
            <table class="table" id="myTable">
  					  <thead>
  					    <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Penulis</th>
                  <th scope="col">penerbit</th>
  					      <th scope="col">Tahun terbit</th>
  					      <th scope="col" class="text-center">Aksi</th>
  					    </tr>
  					  </thead>
  					  <tbody>
                <?php $no =1 ; ?>
  					  	@foreach ($Buku as $buku)
  						    <tr>
                    <td><?= $no++; ?></td>
                    <td>{{ $buku->nama_buku }}</td>
                    <td>{{ $buku->harga_buku }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ $buku->penerbit }}</td>
  						      <td>{{ $buku->tahun }}</td>
  						      <td>
                      <div class="row justify-content-center m-0">
    						      	<a href="/buku/edit/{{ $buku->id }}" class="btn btn-primary btn-sm col-md-5 rounded-pill">Edit
    						      	</a>
    					      		<a href="{{ route('hapusBuku', $buku->id) }}" class="btn btn-sm btn-danger col-md-5 rounded-pill

                          <?php 

                            $status = DB::table('peminjaman')->where('id_buku',$buku->id)->count();
                              if ($status > 0) :
                            ?>
                              disabled
                            <?php endif; ?>

                          ">Hapus</a>
                        
                      </div>
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



<!-- Modal -->
<div class="modal fade" id="addBuku" tabindex="-1" role="dialog" aria-labelledby="addBukuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addBukuLabel">Tambah buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/buku/create" method="post">
        	@csrf
        	<div class="form-group">
            <div class="row">
              <div class="col-sm-1">
                <label for="buku">Nama</label>
              </div>
              <div class="col-sm-11">
			           <input type="text" class="form-control" id="buku" name="buku" placeholder="Nama buku" required>
              </div>
            </div>
			    </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-1">
                <label for="harga_buku">Harga</label>
              </div>
              <div class="col-sm-11">
                <input type="number" class="form-control" id="harga_buku" name="harga" value="50000" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-1">
                <label for="penulis">Penulis</label>
              </div>
              <div class="col-sm-11">
                 <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Penulis" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-1">
                <label for="penerbit">Penerbit</label>
              </div>
              <div class="col-sm-11">
                 <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-1">
                <label for="tahun">Tahun Terbit</label>
              </div>
              <div class="col-sm-11">
                 <input type="number" class="form-control" id="tahun" name="tahun" value="2019" required>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection