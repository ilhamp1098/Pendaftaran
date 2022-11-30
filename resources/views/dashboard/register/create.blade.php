@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New User</h1>

</div>

<form method="post" action="/dashboard/register" class="mb-5" enctype="multipart/form-data">
    @csrf
<div class="col-md-6">
<div class="form-floating mb-3">
      <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label>
      @error('email')      
      <div class="invalid-feedback">{{$message}}</div>
      @enderror      
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
      @error('password')      
      <div class="invalid-feedback">{{$message}}</div>
      @enderror      
    </div>

    <div class="mb-3">
    <label for="id_pegawai" class="form-label">id_pegawai</label>    
        <select class="form-select" name="id_pegawai">
            @foreach ($pegawai as $w)
            @if(old('id_pegawai') == $w->id)
            <option value="{{$w->id}}" selected>{{$w->nama_pegawai}}</option>
            @else
            <option value="{{$w->id}}">{{$w->nama_pegawai}}</option>
            @endif
            @endforeach
        </select> 
    </div>    

    <button type="submit" class="btn btn-primary">Create</button>
</div>
</form>
@endsection