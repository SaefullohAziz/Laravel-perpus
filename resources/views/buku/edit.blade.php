@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">edit buku</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/buku/update" method="post">
                    	@csrf
                    	<div class="form-check">
							<input type="hidden" name="id" value="{{ $Buku->id }}">
                    		<div class="input-group mb-3">
							  <input type="text" name="nama_buku" class="form-control" value="{{ $Buku->nama_buku }}">
							  <div class="input-group-append">
							  	<button type="submit" class="btn btn-primary">
								    Update
							  	</button>
							  </div>
							</div>
                    	</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection