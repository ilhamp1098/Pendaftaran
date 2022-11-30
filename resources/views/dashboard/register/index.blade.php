@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">user</h1>

</div>

@if(session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{session('success')}}
  </div>
@endif

<div class="row">
<div class="table-responsive col-lg-6">

<a href="/dashboard/register/create" class="btn btn-primary mb-3">Buat user</a>
        <table class="table table-striped table-sm" id="tb_user">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Email</th>
              <th scope="col">Nama Pegawai</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $c)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{$c->email}}</td>
              <td>{{$c->pegawai->nama_pegawai}}</td>

            </tr>
            @endforeach
          </tbody>
        </table>
        
</div>
</div>


@endsection

