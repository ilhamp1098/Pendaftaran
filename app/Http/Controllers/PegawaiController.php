<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
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
    public function show(Pegawai $pegawai)
    {

        
        return view('dashboard.pegawai.show', [
            'pegawai' => $pegawai
           
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        return view('dashboard.pegawai.edit', [
            'pegawai' => $pegawai,
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
    public function update(Request $request, Pegawai $pegawai)
    {
        $rules = [
            'nama_pegawai' => 'required|max:30',
            'notelp' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'id_wilayah' => 'required'
        ];


        $validatedData = $request->validate($rules);

        Pegawai::where('id', $pegawai->id)
        ->update($validatedData);
        return redirect('/dashboard/pegawai')->with('success', 'The pegawai has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        Pegawai::destroy($pegawai->id);
        return redirect('/dashboard/pegawai')->with('success', 'The pegawai has been deleted!');
    }
}
