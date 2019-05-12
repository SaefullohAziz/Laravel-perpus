@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
					      <th scope="col">Email</th>
					      <th scope="col">Level</th>
					      <th scope="col" colspan="3" class="text-center">Aksi</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach ($users as $user)
						    <tr>
						      <td>{{ $user->name }}</td>
						      <td>{{ $user->email }}</td>
						      <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
						      <td class="px-0 text-center">
						      	<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit
						      	</a>
						      </td>
						      <td class="px-0 text-center">
						      	<a href="{{ route('admin.impersionate', $user->id) }}" class="btn btn-dark btn-sm">Akses user
						      	</a>
						      </td>
						      <td class="px-0 text-center">
						      	<form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
						      		@csrf
						      		{{ method_field('DELETE') }}
						      		<button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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