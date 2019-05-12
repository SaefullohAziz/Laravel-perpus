@if (session('success'))
<div class="text-center alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

@if (session('danger'))
<div class="text-center alert alert-danger" role="alert">
  {{ session('danger') }}
</div>
@endif

@if (session('warning'))
<div class="text-center alert alert-warning" role="alert">
  {{ session('warning') }}
</div>
@endif