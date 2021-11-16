<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jamPelajaran(){
        return $this->belongsTo(JamPelajaran::class);
    }

    public function rombel(){
        return $this->belongsTo(Rombel::class);
    }

    public function guruMataPelajaran(){
        return $this->belongsTo(GuruMataPelajaran::class);
    }

    public function getHari($hari){
        switch ($hari) {
            case 'sunday':
                return 'senin';
                break;
            case 'tuesday':
                return 'selasa';
                break;
            case 'wednesday':
                return 'rabu';
                break;
            case 'thursday':
                return 'kamis';
                break;
            case 'friday':
                return 'jumat';
                break;
            case 'saturday':
                return 'sabtu';
                break;            
            default:
                return null;
                break;
        }
    }
}
