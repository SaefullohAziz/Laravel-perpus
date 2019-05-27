@extends('layouts.app')

@section('title', 'Profile')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow" style="border-radius: 25px;">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            Profile
                        </div>
                        <div class="col text-right">
                            <a href="/profile/edit" class="btn btn-dark rounded-pill col-4 disabled" >Edit profile</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <form>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control rounded-pill" id="email" value="{{ $User->email }}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="username">Nama User</label>
                        <input type="text" class="form-control rounded-pill text-capitalize" id="username" value="{{ $User->name }}" readonly>
                      </div>
                      <small class="text-danger">*Mohon maaf fungsi edit user sedang dimatikan</small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
