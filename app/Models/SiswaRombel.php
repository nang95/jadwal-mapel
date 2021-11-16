<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaRombel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rombel(){
        return $this->belongsTo(Rombel::class);
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }
}
