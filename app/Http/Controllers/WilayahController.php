<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.wilayah.index', [
            'wilayah' =>Wilayah::All()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.wilayah.create');
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
            'nama_wilayah' => 'required|max:30',
        ]);

        Wilayah::create($validatedData);

        return redirect('/dashboard/wilayah')->with('success', 'New Wilayah has been addes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function show(Wilayah $wilayah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function edit(Wilayah $wilayah)
    {
        return view('dashboard.wilayah.edit', [
            'wilayah' => $wilayah
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wilayah $wilayah)
    {
        $rules = [
            'nama_wilayah' => 'required|max:30'
        ];


        $validatedData = $request->validate($rules);

        Wilayah::where('id', $wilayah->id)
        ->update($validatedData);
        return redirect('/dashboard/wilayah')->with('success', 'The wilayah has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wilayah $wilayah)
    {
        Wilayah::destroy($wilayah->id);
        return redirect('/dashboard/wilayah')->with('success', 'The wilayah has been deleted!');
    }
}
