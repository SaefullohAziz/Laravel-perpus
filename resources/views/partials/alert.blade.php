 @if (session('success'))
<div class="text-center alert alert-success" role="alert">
  {{ session('success') }}
</div>

@elseif (session('danger'))
<div class="text-center alert alert-danger" role="alert">
  {{ session('danger') }}
</div>

@elseif (session('warning'))
<div class="text-center alert alert-warning" role="alert">
  {{ session('warning') }}
</div>

@elseif (session('info'))
	<div class="alert alert-dark alert-dismissible fade show" role="alert">
	  Hallo, <span class="font-weight-bold">{{ Auth::user()->name }}!</span> {{ session('info') }}
	  <a href="/peminjaman/perpanjangan/{{ session('id_peminjaman') }}" class="btn btn-light btn-sm">Klik untuk perpanjangan</a>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif