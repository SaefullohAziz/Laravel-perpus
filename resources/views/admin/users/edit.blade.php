@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">edit {{ $user->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                    	@csrf
                    	{{ method_field('put') }}
                    	@foreach ($roles as $role)
                    	<div class="form-check">
                    		<input type="checkbox" name="roles[]" value="{{ $role->id }}"
                    			{{ $user->hasAnyRole($role->name)? 'checked':'' }}>
                    			<label>{{ $role->name }}</label>
                    	</div>
                    	@endforeach
                    	<button type="submit" class="btn btn-primary">
                    		update
                    	</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection