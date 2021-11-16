<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Guru, Siswa, Kelas, Absensi, JadwalPelajaran, SiswaRombel};

class DashboardController extends Controller
{
    public function index(){
        $jadwal_pelajaran = new JadwalPelajaran;
        $hari_ini = $jadwal_pelajaran->getHari(date('l'));
        $data_guru = Guru::where('user_id', auth()->user()->id)->first();
        
        $siswa = Siswa::whereIn('id', function($siswa_rombel) use($data_guru){
            $siswa_rombel->select('siswa_id')->from('siswa_rombels')->whereIn('rombel_id', function($rombel) use($data_guru){
                $rombel->select('id')->from('rombels')->where('guru_id', $data_guru->id);
            });
        })->count();

        $kelas = Kelas::whereIn('id', function($rombel) use($data_guru){
            $rombel->select('id')->from('rombels')->where('guru_id', $data_guru->id);
        })->count();

        $jadwal_pelajaran = JadwalPelajaran::wherehas('jamPelajaran', function($query) use($hari_ini){
            $query->where('hari', $hari_ini)->orderBy('jam_mulai', 'asc');
        })->get(); 
        
        return view('apps.guru.dashboard')->with('siswa', $siswa)
                                          ->with('kelas', $kelas)
                                          ->with('jadwal_pelajaran', $jadwal_pelajaran);
    }
}
