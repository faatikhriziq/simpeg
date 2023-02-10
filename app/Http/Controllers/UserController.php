<?php

namespace App\Http\Controllers;


use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('add-user');
    }



    public function dataUser(){
        $dataUser = User::all();
        return view('data-admin', compact('dataUser'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'foto'  => 'image',
            'password' => 'required|confirmed|min:5',
        ]);
        $pathFoto = null;
        if($request->hasFile('foto')){
            $pathFoto = $request->file('foto')->store('images/pp');
        }

        $dataUser = array(
            'name' => $request->name,
            'email' => $request->email,
            'foto' => $pathFoto,
            'password' => Hash::make($request->password)
        );

        $saveUser = User::create($dataUser);

        if ($saveUser) {
            Session::flash('success', 'Data User Berhasil Di Simpan!');
        }

        return redirect('/data-user');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        Storage::delete($user->foto);
        $deleteUser = $user->delete();

        if($deleteUser){
            Session::flash('success', 'Data User Berhasil Di Hapus!');
        }

        return redirect('/data-user');
    }
}
