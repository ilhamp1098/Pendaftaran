@extends('dashboard.layout.main')

@section('container')

<div class="container">
	<div class="row">
		<div class="col-md-8">
<article class="my-5">
<table>
    <tr>
        <th>Invoice</th>
        <td>:</td>
        <td>{{ $tagihan->invoice }}</td>
    </tr> 
    <tr>
        <th>Tanggal Tagihan</th>
        <td>:</td>
        <td>{{ $tagihan->tgl_tagihan }}</td>
    </tr>        
    <tr>
        <th>Nama Pasien</th>
        <td>:</td>
        <td>{{ $tagihan->tindakan->pasien->nama_pasien }}</td>
    </tr>
  
    <tr>
        <th>Nama tindakan</th>
        <td>:</td>
        <td>{{ $tagihan->tindakan->nama_tindakan }}</td>
    </tr>
   
    <tr>
        <th>Nama Obat</th>
        <td>:</td>
        <td>{{ $tagihan->tindakan->obat->nama_obat }}</td>
    </tr>
    <tr>
        <th>Jumlah</th>
        <td>:</td>
        <td>{{ $tagihan->tindakan->jumlah }}</td>
    </tr>    
    <tr>
        <th>Harga Obat Satuan</th>
        <td>:</td>
        <td>Rp. {{ number_format($tagihan->tindakan->obat->harga) }}</td>
    </tr>    

    <tr>
        <th>Tarif tindakan</th>
        <td>:</td>
        <td>Rp. {{ number_format($tagihan->tindakan->tarif_tindakan) }}</td>
    </tr>     
    <tr>
        <th>Total</th>
        <td>:</td>
        <td>Rp. {{ number_format($total = $tagihan->tindakan->tarif_tindakan+($tagihan->tindakan->jumlah*$tagihan->tindakan->obat->harga) ) }}</td>
    </tr>    
    
</table>

    <a href="/dashboard/tagihan" class="btn btn-info my-5"><span data-feather="arrow-left"></span> Kembali</a>

    

</article>


		</div>
	</div>
</div>

@endsection