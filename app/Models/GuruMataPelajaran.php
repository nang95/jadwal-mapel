<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruMataPelajaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function guru(){
        return $this->belongsTo(Guru::class);
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function mataPelajaran(){
        return $this->belongsTo(MataPelajaran::class);
    }

    public function daftarNilai(){
        return $this->hasMany(DaftarNilai::class);
    }

    public function jadwalPelajaran(){
        return $this->hasMany(JadwalPelajaran::class);
    }
}
