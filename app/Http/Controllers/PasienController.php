<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use DB;
class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pasiens')->select('pasiens.id',
        'pasiens.nama_pasien',
        'pasiens.notelp',
        'pasiens.id_wilayah',
        'wilayahs.nama_wilayah')
        ->join('wilayahs', 'wilayahs.id', '=', 'pasiens.id_wilayah')
        ->orderBy('pasiens.id', 'desc')
        ->get();


        return view('dashboard.pasien.index', [
            'pasien' =>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pasien.create', [
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
            'nama_pasien' => 'required|max:30',
            'notelp' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'id_wilayah' => 'required'
        ]);

        Pasien::create($validatedData);

        return redirect('/dashboard/pasien')->with('success', 'New pasien has been addes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        return view('dashboard.pasien.show', [
            'pasien' => $pasien
           
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        return view('dashboard.pasien.edit', [
            'pasien' => $pasien,
            'wilayah' => Wilayah::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $rules = [
            'nama_pasien' => 'required|max:30',
            'notelp' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'id_wilayah' => 'required'
        ];


        $validatedData = $request->validate($rules);

        Pasien::where('id', $pasien->id)
        ->update($validatedData);
        return redirect('/dashboard/pasien')->with('success', 'The pasien has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::destroy($pasien->id);
        return redirect('/dashboard/pasien')->with('success', 'The pasien has been deleted!');
    }
}
