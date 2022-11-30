@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Obat</h1>

</div>

<form method="post" action="/dashboard/obat" class="mb-5" enctype="multipart/form-data">
    @csrf
<div class="col-md-6">
  <div class="mb-3">
    <label for="nama_obat" class="form-label">Nama obat</label>
    <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" name="nama_obat" id="nama_obat"  required autofocus value="{{old('nama_obat')}}">
    @error('nama_obat')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
 
  <div class="mb-3">
    <label for="harga" class="form-label">Harga obat</label>
    <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga"  required autofocus value="{{old('harga')}}">
    @error('harga')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>  

    <button type="submit" class="btn btn-primary">Create</button>
</div>
</form>
@endsection