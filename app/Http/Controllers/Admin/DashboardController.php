<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Guru, Siswa, Kelas, JadwalPelajaran};

class DashboardController extends Controller
{
    public function index(){
        $guru = Guru::count();
        $siswa = Siswa::count();
        $kelas = Kelas::count();
        $jadwal_pelajaran = new JadwalPelajaran;
        $hari_ini = $jadwal_pelajaran->getHari(date('l'));

        $jadwal_pelajaran = JadwalPelajaran::wherehas('jamPelajaran', function($query) use($hari_ini){
            $query->where('hari', $hari_ini)->orderBy('jam_mulai', 'asc');
        })->get();  

        return view('apps.admin.dashboard')->with('guru', $guru)
                                           ->with('siswa', $siswa)
                                           ->with('kelas', $kelas)
                                           ->with('jadwal_pelajaran', $jadwal_pelajaran);
    }
}
