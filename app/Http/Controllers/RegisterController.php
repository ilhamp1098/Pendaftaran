<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('dashboard.register.index', [
            'user' =>User::All()
        ]);
    }

    public function create()
    {
        return view('dashboard.register.create', [
            'pegawai' =>Pegawai::All()
        ]);
    } 
    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_pegawai' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:30'
        ]);

        // $validateData['password'] = bcrypt($validateData['password']);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);
        // $request->session()->flash('success', 'Registration successfull! Please Login.');
        return redirect('/dashboard/register')->with('success', 'Registration successfull! Please Login.');
    }    
}
