@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New tagihan</h1>

</div>

<form method="post" action="/dashboard/tagihan" class="mb-5" enctype="multipart/form-data">
    @csrf
<div class="col-md-6">


  <div class="mb-3">
    <label for="tgl_tagihan" class="form-label">Tanggal tagihan</label>
    <input type="date" class="form-control @error('tgl_tagihan') is-invalid @enderror" name="tgl_tagihan" id="tgl_tagihan"  required autofocus value=" {{old('tgl_tagihan')}}">
    @error('tgl_tagihan')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div> 

  <div class="mb-3">
  <label for="id_tindakan" class="form-label">id_tindakan</label>    
    <select class="form-select" name="id_tindakan">
        @foreach ($tindakan as $w)
          @if(old('id_tindakan') == $w->id)
        <option value="{{$w->id}}" selected>{{$w->nama_tindakan}}</option>
          @else
        <option value="{{$w->id}}">{{$w->nama_tindakan}}</option>
          @endif
        @endforeach
    </select> 
  </div>
    <button type="submit" class="btn btn-primary">Create</button>
</div>
</form>
@endsection