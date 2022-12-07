@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Grafik Pegawai</h1>

</div>

<div id="grafik_pegawai">
</div>

<div id="grafik_pasien">
</div>

<div id="grafik_pendaftaran">
</div>

<div id="grafik_tagihan">
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var total = <?= json_encode($total) ?>;
    var bulan = <?= json_encode($bulan) ?>; 

    var total_pasien = <?= json_encode($total_pasien) ?>;
    var bulan_pasien = <?= json_encode($bulan_pasien) ?>; 

    var total_pendaftaran = <?= json_encode($total_pendaftaran) ?>;
    var bulan_pendaftaran = <?= json_encode($bulan_pendaftaran) ?>;  
    
    var total_tagihan = <?= json_encode($total_tagihan) ?>;
    var bulan_tagihan = <?= json_encode($bulan_tagihan) ?>;      
 
    Highcharts.chart('grafik_pegawai',{
        title : {
            text:'Grafik Pegawai'
        },
        xAxis : {
            categories : bulan
        },
        yAxis : {
            title : {
                text:'Jumlah'
            }
        },
        plotOptions:{
            series:{
                allowPointSelect: true
            }
        },
        series:[
            {
                name:'Jumlah',
                data: total
            }
        ]
    });

    Highcharts.chart('grafik_pasien',{
        title : {
            text:'Grafik Pasien'
        },
        xAxis : {
            categories : bulan_pasien
        },
        yAxis : {
            title : {
                text:'Jumlah'
            }
        },
        plotOptions:{
            series:{
                allowPointSelect: true
            }
        },
        series:[
            {
                name:'Jumlah',
                data: total_pasien
            }
        ]
    });    

    Highcharts.chart('grafik_pendaftaran',{
        title : {
            text:'Grafik Pendaftaran'
        },
        xAxis : {
            categories : bulan_pendaftaran
        },
        yAxis : {
            title : {
                text:'Jumlah'
            }
        },
        plotOptions:{
            series:{
                allowPointSelect: true
            }
        },
        series:[
            {
                name:'Jumlah',
                data: total_pendaftaran
            }
        ]
    });     

    Highcharts.chart('grafik_tagihan',{
        title : {
            text:'Grafik Tagihan'
        },
        xAxis : {
            categories : bulan_tagihan
        },
        yAxis : {
            title : {
                text:'Jumlah'
            }
        },
        plotOptions:{
            series:{
                allowPointSelect: true
            }
        },
        series:[
            {
                name:'Jumlah Tagihan',
                data: total_tagihan
            }
        ]
    });            
</script>
@endsection

