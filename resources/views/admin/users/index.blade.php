@extends('layouts.app')

@section('title', 'User')
@section('content')
<div class="container mt-5 pt-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card shadow" style="border-radius: 15px;">

        <div class="card-header py-3">
          <h5 class="m-0 font-weight-bold text-primary">Table user</h5>
        </div>

        <div class="card-body px-1">
          @if (session('sukses'))
            <div class="alert alert-success" role="alert">
              {{ session('sukses') }}
            </div>
          @endif
          <div class="table-responsive">
            <table class="table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
						      <th>Nama</th>
						      <th>Email</th>
						      <th>Level</th>
						      <th colspan="3" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no =1 ; ?>
						  	@foreach ($users as $user)
							    <tr>
							    	<td><?= $no++; ?></td>
							      <td>{{ $user->name }}</td>
							      <td>{{ $user->email }}</td>
							      <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
							      <td>
							      	<a href="{{ route('admin.impersionate', $user->id) }}" class="btn btn-dark btn-sm col-12 rounded-pill">Akses user
							      	</a>
							      </td>
							      <td>
							      	<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm col-12 rounded-pill">Edit
							      	</a>
							      </td>
							      <td>
							      	<form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
							      		@csrf
							      		{{ method_field('DELETE') }}
							      		<button type="submit" class="btn btn-sm col-12 rounded-pill btn-danger">Hapus</button>
							      	</form>
							      </td>
							    </tr>
						    @endforeach
              </tbody>
            </table>
            {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection