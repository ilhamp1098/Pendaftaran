@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Category</h1>

</div>

<form method="post" action="/dashboard/wilayah" class="mb-5" enctype="multipart/form-data">
    @csrf
<div class="col-md-6">
  <div class="mb-3">
    <label for="nama_wilayah" class="form-label">Nama Wilayah</label>
    <input type="text" class="form-control @error('nama_wilayah') is-invalid @enderror" name="nama_wilayah" id="nama_wilayah"  required autofocus value=" {{old('nama_wilayah')}}">
    @error('nama_wilayah')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>

    <button type="submit" class="btn btn-primary">Create</button>
</div>
</form>
@endsection