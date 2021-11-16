<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamPelajaran extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function jadwalPelajaran(){
        return $this->hasMany(JadwalPelajaran::class);
    }
}
