@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New tindakan</h1>

</div>

<form method="post" action="/dashboard/tindakan/{{$tindakan->id}}" class="mb-5" enctype="multipart/form-data">
@method('put') 
@csrf
<div class="col-md-6">

    <div class="mb-3">
        <label for="pasien" class="form-label">pasien</label>    
        <select class="form-select" name="id_pasien">
            @foreach ($pasien as $w)
            @if(old('id_pasien',$tindakan->id_pasien) == $w->id)
            <option value="{{$w->id}}" selected>{{$w->nama_pasien}}</option>
            @else
            <option value="{{$w->id}}">{{$w->nama_pasien}}</option>
            @endif
            @endforeach
            
        </select> 
    </div>

  <div class="mb-3">
    <label for="nama_tindakan" class="form-label">Nama tindakan</label>
    <input type="text" class="form-control @error('nama_tindakan') is-invalid @enderror" name="nama_tindakan" id="nama_tindakan"  required autofocus value="{{old('nama_tindakan', $tindakan->nama_tindakan)}}">
    @error('nama_tindakan')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="tarif_tindakan" class="form-label">Tarif Tindakan</label>
    <input type="number" class="form-control @error('tarif_tindakan') is-invalid @enderror" name="tarif_tindakan" id="tarif_tindakan"  required autofocus value="{{old('tarif_tindakan', $tindakan->tarif_tindakan)}}">
    @error('tarif_tindakan')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>

  <div class="mb-3">
  <label for="id_obat" class="form-label">obat</label>    
    <select class="form-select" name="id_obat">
        @foreach ($obat as $w)
          @if(old('id_obat', $tindakan->id_obat) == $w->id)
        <option value="{{$w->id}}" selected>{{$w->nama_obat}}</option>
          @else
        <option value="{{$w->id}}">{{$w->nama_obat}}</option>
          @endif
        @endforeach
    </select> 
  </div>

  <div class="mb-3">
    <label for="jumlah" class="form-label">Jumlah Obat</label>
    <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah"  required autofocus value="{{old('jumlah', $tindakan->jumlah)}}">
    @error('jumlah')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div> 
    <button type="submit" class="btn btn-success">Edit</button>
</div>
</form>
@endsection