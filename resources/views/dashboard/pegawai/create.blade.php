@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Pegawai</h1>

</div>

<form method="post" action="/dashboard/pegawai" class="mb-5" enctype="multipart/form-data">
    @csrf
<div class="col-md-6">
  <div class="mb-3">
    <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
    <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" name="nama_pegawai" id="nama_pegawai"  required autofocus value="{{old('nama_pegawai')}}">
    @error('nama_pegawai')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="notelp" class="form-label">No Telp</label>
    <input type="text" class="form-control @error('notelp') is-invalid @enderror" name="notelp" id="notelp"  required autofocus value=" {{old('notelp')}}">
    @error('notelp')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" id="tgl_lahir"  required autofocus value=" {{old('tgl_lahir')}}">
    @error('tgl_lahir')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div> 
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"  required autofocus value=" {{old('alamat')}}" cols="30" rows="10"></textarea>
    @error('alamat')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>  
  <div class="mb-3">
  <label for="wilayah" class="form-label">Wilayah</label>    
    <select class="form-select" name="id_wilayah">
        @foreach ($wilayah as $w)
          @if(old('id_wilayah') == $w->id)
        <option value="{{$w->id}}" selected>{{$w->nama_wilayah}}</option>
          @else
        <option value="{{$w->id}}">{{$w->nama_wilayah}}</option>
          @endif
        @endforeach
    </select> 
  </div>
    <button type="submit" class="btn btn-primary">Create</button>
</div>
</form>
@endsection