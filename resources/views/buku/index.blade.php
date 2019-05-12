@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<div class="d-flex justify-content-between">
		                <h5 class="card-title">Table buku</h5>
		                <!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						  +
						</button>
		            </div>
	            </div>

                <div class="card-body px-0 shadow">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                    <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Nama</th>
					      <th scope="col">Aksi</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach ($Buku as $buku)
						    <tr>
						      <td>{{ $buku->nama_buku }}</td>
						      <td>
						      	<a href="/buku/edit/{{ $buku->id }}" class="btn btn-primary btn-sm">Edit
						      	</a>
					      		<a href="{{ route('hapusBuku', $buku->id) }}" class="btn btn-sm btn-danger">Hapus</a>
						      </td>
						    </tr>
					    @endforeach
					  </tbody>
					</table>
					{{ $Buku->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/buku/create" method="post">
        	@csrf
        	<div class="form-group">
			    <input type="text" class="form-control" id="buku" name="buku" placeholder="Nama buku">
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