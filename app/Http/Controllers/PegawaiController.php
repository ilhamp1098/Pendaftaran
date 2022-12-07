<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pasien;
use App\Models\Pendaftaran;
use App\Models\Tagihan;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use DB;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pegawais')->select('pegawais.id',
        'pegawais.nama_pegawai',
        'pegawais.notelp',
        'pegawais.id_wilayah',
        'wilayahs.nama_wilayah')
        ->join('wilayahs', 'wilayahs.id', '=', 'pegawais.id_wilayah')
        ->orderBy('pegawais.id', 'desc')
        ->get();


        return view('dashboard.pegawai.index', [
            'pegawai' =>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pegawai.create', [
            'wilayah' =>Wilayah::All()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pegawai' => 'required|max:30',
            'notelp' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'id_wilayah' => 'required'
        ]);

        Pegawai::create($validatedData);

        return redirect('/dashboard/pegawai')->with('success', 'New pegawai has been addes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = DB::table('pegawais')->select('pegawais.id',
        'pegawais.nama_pegawai',
        'pegawais.notelp',
        'pegawais.tgl_lahir',
        'pegawais.alamat',
        'pegawais.id_wilayah',
        'wilayahs.nama_wilayah')
        ->join('wilayahs', 'wilayahs.id', '=', 'pegawais.id_wilayah')
        ->where('pegawais.id', $id)
        ->orderBy('pegawais.id', 'desc')
        ->first();        
        return view('dashboard.pegawai.show', [
            'pegawai' => $data
           
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('pegawais')->select('pegawais.id',
        'pegawais.nama_pegawai',
        'pegawais.notelp',
        'pegawais.tgl_lahir',
        'pegawais.alamat',
        'pegawais.id_wilayah',
        'wilayahs.nama_wilayah')
        ->join('wilayahs', 'wilayahs.id', '=', 'pegawais.id_wilayah')
        ->where('pegawais.id', $id)
        ->orderBy('pegawais.id', 'desc')
        ->first();        
        return view('dashboard.pegawai.edit', [
            'pegawai' => $data,
            'wilayah' => Wilayah::all()
           
        ]);        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $rules = [
            'nama_pegawai' => 'required|max:30',
            'notelp' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'id_wilayah' => 'required'
        ];


        $validatedData = $request->validate($rules);

        Pegawai::where('id', $request->id)
        ->update($validatedData);
        return redirect('/dashboard/pegawai')->with('success', 'The pegawai has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::destroy($id);
        return redirect('/dashboard/pegawai')->with('success', 'The pegawai has been deleted!');
    }

    public function grafik()
    {
        $total = Pegawai::select(DB::raw(" count(id) as total, monthname(tgl_lahir) month"))
        ->GroupBy(DB::raw("month"))
        ->pluck('total');
        $bulan = Pegawai::select(DB::raw("monthname(tgl_lahir) as bulan"))
        ->GroupBy(DB::raw("bulan"))
        ->pluck('bulan');



        $total_pasien = Pasien::select(DB::raw(" count(id) as total, monthname(created_at) month"))
        ->GroupBy(DB::raw("month"))
        ->pluck('total');
        $bulan_pasien = Pasien::select(DB::raw("monthname(created_at) as bulan"))
        ->GroupBy(DB::raw("bulan"))
        ->pluck('bulan');  
        


        $total_pendaftaran = Pendaftaran::select(DB::raw(" count(id) as total, monthname(tgl_pendaftaran) month"))
        ->GroupBy(DB::raw("month"))
        ->pluck('total');

        $bulan_pendaftaran = Pendaftaran::select(DB::raw("monthname(tgl_pendaftaran) as bulan"))
        ->GroupBy(DB::raw("bulan"))
        ->pluck('bulan');  
        
        $total_tagihan = Tagihan::select(DB::raw(" CAST(SUM(tindakans.tarif_tindakan+(obats.harga*tindakans.jumlah))as int) as total, monthname(tagihans.tgl_tagihan) as bulan"))
        ->join('tindakans', 'tindakans.id', '=', 'tagihans.id_tindakan')
        ->join('obats', 'obats.id', '=', 'tindakans.id_obat')
        ->GroupBy(DB::raw("bulan"))
        ->OrderBy(DB::raw("bulan","desc"))
        ->pluck('total');

        $bulan_tagihan = Tagihan::select(DB::raw("monthname(tgl_tagihan) as bulan"))
        ->GroupBy(DB::raw("bulan"))
        ->OrderBy(DB::raw("bulan","desc"))
        ->pluck('bulan');          
        
        return view('dashboard.pegawai.grafik', 
        compact('total','bulan',
                'total_pasien','bulan_pasien',
                'total_pendaftaran','bulan_pendaftaran',                
                'total_tagihan','bulan_tagihan'
            ));

    }
}
