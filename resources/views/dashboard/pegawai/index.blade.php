@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pegawai</h1>

</div>

@if(session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{session('success')}}
  </div>
@endif

<div class="row">
<div class="table-responsive col-lg-6">

<a href="/dashboard/pegawai/create" class="btn btn-primary mb-3">Buat Pegawai</a>
        <table class="table table-striped table-sm" id="tb_pegawai">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Pegawai</th>
              <th scope="col">No Telp</th>
              <th scope="col">Wilayah</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pegawai as $c)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{$c->nama_pegawai}}</td>
              <td>{{$c->notelp}}</td>
              <td>{{$c->nama_wilayah}}</td>
              <td>
              <a href="/dashboard/pegawai/{{$c->id}}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/pegawai/{{$c->id}}/edit" class="badge bg-success"><span data-feather="edit"></span></a>
                <form action="/dashboard/pegawai-delete/{{$c->id}}" method="post" class="d-inline">

                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                </form>                
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
</div>
</div>


@endsection

