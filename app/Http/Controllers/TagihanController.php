<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Pasien;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tagihan.index', [
            'tagihan' =>Tagihan::All()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tagihan.create', [
            'pasien' =>Pasien::All(),
            'tindakan' =>Tindakan::All()
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
            'id_tindakan' => 'required',
            'tgl_tagihan' => 'required',
        ]);

        $hari = date('md',strtotime($request->tgl_tagihan));

        Tagihan::create([
            'id_tindakan' => $request->id_tindakan,
            'tgl_tagihan' => $request->tgl_tagihan,
            'invoice' => 'INV-'.$request->id_tindakan.'-'.$hari,
         ]);

        return redirect('/dashboard/tagihan')->with('success', 'New tagihan has been addes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function show(Tagihan $tagihan)
    {
        return view('dashboard.tagihan.show', [
            'tagihan' => $tagihan
           
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tagihan $tagihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tagihan $tagihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tagihan $tagihan)
    {
        Tagihan::destroy($tagihan->id);
        return redirect('/dashboard/tagihan')->with('success', 'The tagihan has been deleted!');
    }
}
