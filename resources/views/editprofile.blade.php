@extends('layouts.app')

@section('title', 'Profile Edit')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow" style="border-radius: 25px;">
                <div class="card-header">
                    Edit profile
                </div>

                <div class="card-body">

                    <form action="/profile/act" method="post">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control rounded-pill" id="email" name="email" value="{{ $User->email }}" readonly>
                        <small class="text-danger">*Email ridak dapat diubah</small>
                      </div>
                      <div class="form-group">
                        <label for="username">Nama User</label>
                        <input type="text" class="form-control rounded-pill" id="username" name="name" value="{{ $User->name }}">
                      </div>
                      <div class="form-group">
                        <label for="pass">Password baru</label>
                        <input type="password" class="form-control rounded-pill" id="pass" name="pass">
                        <small class="text-danger">*Dapat dikosongkan jika tak ingin merubah</small>
                      </div>
                      <div class="form-group">
                        <label for="repass">Ulangi password baru</label>
                        <input type="password" class="form-control rounded-pill" id="repass" name="repass">
                      </div>
                      <div class="row justify-content-center">
                      		<a href="/profile" class="btn btn-secondary col-md-3 mx-1 rounded-pill">Kembali</a>
                      		<button type="submit" class="btn btn-primary col-md-3 mx-1 rounded-pill">Simpan</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
