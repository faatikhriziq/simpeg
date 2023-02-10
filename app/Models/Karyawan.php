<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;


    public function riwayatPendidikan(){
        return $this->hasMany(RiwayatPendidikan::class);
    }
    public function riwayatPenyakit(){
        return $this->hasMany(RiwayatPenyakit::class);
    }
    public function riwayatPelatihan(){
        return $this->hasMany(RiwayatPelatihan::class);
    }
    public function riwayatPekerjaan(){
        return $this->hasMany(RiwayatPekerjaan::class);
    }
}
