<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function guru(){
        return $this->belongsTo(Guru::class);
    }

    public function jadwalPelajaran(){
        return $this->hasMany(JadwalPelajaran::class);
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function siswaRombel(){
        return $this->hasMany(SiswaRombel::class);
    }
}
