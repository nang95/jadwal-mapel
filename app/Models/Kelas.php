<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tingkat(){
        return $this->belongsTo(Tingkat::class);
    }
    
    public function rombel(){
        return $this->hasMany(Rombel::class);
    }

    public function guruMataPelajaran(){
        return $this->hasMany(GuruMataPelajaran::class);
    }
}
