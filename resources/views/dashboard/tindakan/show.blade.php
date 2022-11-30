@extends('dashboard.layout.main')

@section('container')

<div class="container">
	<div class="row">
		<div class="col-md-8">
<article class="my-5">
<table>
    <tr>
        <th>Nama Pasien</th>
        <td>:</td>
        <td>{{ $tindakan->pasien->nama_pasien }}</td>
    </tr>
  
    <tr>
        <th>Nama tindakan</th>
        <td>:</td>
        <td>{{ $tindakan->nama_tindakan }}</td>
    </tr>
  
    <tr>
        <th>Nama Obat</th>
        <td>:</td>
        <td>{{ $tindakan->obat->nama_obat }}</td>
    </tr>
   
    <tr>
        <th>Jumlah</th>
        <td>:</td>
        <td>{{ $tindakan->jumlah }}</td>
    </tr>
   
    
</table>

    <a href="/dashboard/tindakan" class="btn btn-info my-5"><span data-feather="arrow-left"></span> Kembali</a>
    <a href="/dashboard/tindakan/{{$tindakan->id}}/edit" class="btn btn-success my-5"><span data-feather="edit"></span> Edit</a>
	
	<form action="/dashboard/tindakan/{{$tindakan->id}}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger my-5 border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>	
    

</article>


		</div>
	</div>
</div>

@endsection