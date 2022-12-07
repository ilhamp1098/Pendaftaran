@extends('dashboard.layout.main')

@section('container')

<div class="container">
	<div class="row">
		<div class="col-md-8">
<article class="my-5">
<table>
    <tr>
        <th>Nama Pegawai</th>
        <td>:</td>
        <td>{{ $pegawai->nama_pegawai }}</td>
    </tr>
    <tr>
        <th>No Telp.</th>
        <td>:</td>
        <td>{{ $pegawai->notelp }}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>:</td>
        <td>{{ $pegawai->tgl_lahir }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>:</td>
        <td>{{ $pegawai->alamat }}</td>
    </tr>
    <tr>
        <th>Wilayah</th>
        <td>:</td>
        <td>{{ $pegawai->nama_wilayah }}</td>
    </tr>         
    
    
</table>

    <a href="/dashboard/pegawai" class="btn btn-info my-5"><span data-feather="arrow-left"></span> Kembali</a>
    <a href="/dashboard/pegawai/{{$pegawai->id}}/edit" class="btn btn-success my-5"><span data-feather="edit"></span> Edit</a>
	
	<form action="/dashboard/pegawai-delete/{{$pegawai->id}}" method="post" class="d-inline">      
                  @csrf
                  <button class="btn btn-danger my-5 border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>	
    

</article>


		</div>
	</div>
</div>

@endsection