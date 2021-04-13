@if ($errors->has('buscarpor'))
<div class="alert alert-danger alert-dismissible">
  <h5><i class="icon fas fa-exclamation-circle"></i>Error!</h5>
  {{ $errors->first('buscarpor') }}
</div>
@endif
@if (session()->has('alert'))
<div class="alert alert-warning alert-dismissible">
  <h5><i class="icon fas fa-exclamation-triangle"></i>Aviso!</h5>
  {{ session('alert') }}
</div>
@endif
@if (session()->has('info'))
<div class="alert alert-info alert-dismissible">
<h5><i class="icon fas fa-info"></i>Atencion!</h5>
{{ session('info') }}
</div>
@endif
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible">
<h5><i class="icon fas fa-check"></i>Listo!</h5>
{{ session('success') }}
</div>
@endif
