<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function siswaRombel(){
        return $this->hasMany(SiswaRombel::class);
    }

    public function absensi(){
        return $this->hasMany(Absensi::class);
    }

    public function daftarNilai(){
        return $this->hasMany(DaftarNilai::class);
    }
}
