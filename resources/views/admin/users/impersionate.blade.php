@extends('layouts.app')

@section('title', 'impersionate')
@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-6">
            <div class="card shadow"  style="border-radius: 15px;">
                <div class="card-header font-weight-bold">Konfirmasi password</div>

                <div class="card-body">
                    <form action="/admin/impersionate" method="post">
                    	@csrf
						            <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group">
                          <label>Konfirmasi password anda</label>
                          <input type="password" name="pass_admin" class="form-control rounded-pill">
                        </div>
                        <div class="form-group">
                          <label>Konfirmasi password user</label>
          							  <input type="password" name="pass_user" class="form-control rounded-pill">
                        </div>
                        <div class="text-right">
        							  	<a href="/buku" class="btn btn-secondary col-2 rounded-pill">
        								    Kembali
        							  	</a>
                          <button type="submit" class="btn btn-primary col-2 rounded-pill">
                            Akses
                          </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection