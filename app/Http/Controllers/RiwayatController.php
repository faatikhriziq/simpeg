<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(){
        $dataKaryawan = Karyawan::with('riwayatPendidikan','riwayatPendidikan','riwayatPelatihan','riwayatPekerjaan')->paginate(10);
        return view('data-riwayat',compact('dataKaryawan'));
    }



}
