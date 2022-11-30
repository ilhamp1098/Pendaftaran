<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use App\Models\Pasien;
use App\Models\Obat;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tindakan.index', [
            'tindakan' =>Tindakan::All()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tindakan.create', [
            'pasien' =>Pasien::All(),
            'obat' =>Obat::All()
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
            'id_pasien' => 'required',
            'nama_tindakan' => 'required',
            'tarif_tindakan' => 'required',
            'id_obat' => 'required',
            'jumlah' => 'required'
        ]);

        Tindakan::create($validatedData);

        return redirect('/dashboard/tindakan')->with('success', 'New tindakan has been addes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function show(Tindakan $tindakan)
    {
        return view('dashboard.tindakan.show', [
            'tindakan' => $tindakan
           
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tindakan $tindakan)
    {
        return view('dashboard.tindakan.edit', [
            'tindakan' => $tindakan,
            'pasien' => Pasien::all(),
            'obat' => Obat::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tindakan $tindakan)
    {
        $rules = [
            'id_pasien' => 'required',
            'nama_tindakan' => 'required',
            'tarif_tindakan' => 'required',
            'id_obat' => 'required',
            'jumlah' => 'required'
        ];


        $validatedData = $request->validate($rules);

        Tindakan::where('id', $tindakan->id)
        ->update($validatedData);
        return redirect('/dashboard/tindakan')->with('success', 'The tindakan has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tindakan $tindakan)
    {
        Tindakan::destroy($tindakan->id);
        return redirect('/dashboard/tindakan')->with('success', 'The tindakan has been deleted!');
    }
}
