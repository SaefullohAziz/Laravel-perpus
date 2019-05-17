@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-6">
            <div class="card shadow"  style="border-radius: 15px;">
                <div class="card-header font-weight-bold">Edit buku</div>

                <div class="card-body">
                    <form action="/buku/update" method="post">
                    	@csrf
						            <input type="hidden" name="id" value="{{ $Buku->id }}">
                        <div class="form-group">
                          <label>Nama buku</label>
          							  <input type="text" name="nama_buku" class="form-control rounded-pill" value="{{ $Buku->nama_buku }}">
                        </div>
                        <div class="form-group">
                          <label>Harga buku</label>
                          <input type="text" name="harga_buku" class="form-control rounded-pill " value="{{ $Buku->harga_buku }}">
                        </div>
                        <div class="text-right">
        							  	<a href="/buku" class="btn btn-secondary col-2 rounded-pill">
        								    Kembali
        							  	</a>
                          <button type="submit" class="btn btn-primary col-2 rounded-pill">
                            Update
                          </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection