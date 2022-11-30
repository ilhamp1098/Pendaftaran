@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New pendaftaran</h1>

</div>

<form method="post" action="/dashboard/pendaftaran" class="mb-5" enctype="multipart/form-data">
    @csrf
<div class="col-md-6">


  <div class="mb-3">
    <label for="tgl_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
    <input type="date" class="form-control @error('tgl_pendaftaran') is-invalid @enderror" name="tgl_pendaftaran" id="tgl_pendaftaran"  required autofocus value=" {{old('tgl_pendaftaran')}}">
    @error('tgl_pendaftaran')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div> 

  <div class="mb-3">
  <label for="id_pasien" class="form-label">id_pasien</label>    
    <select class="form-select" name="id_pasien">
        @foreach ($pasien as $w)
          @if(old('id_pasien') == $w->id)
        <option value="{{$w->id}}" selected>{{$w->nama_pasien}}</option>
          @else
        <option value="{{$w->id}}">{{$w->nama_pasien}}</option>
          @endif
        @endforeach
    </select> 
  </div>
    <button type="submit" class="btn btn-primary">Create</button>
</div>
</form>
@endsection