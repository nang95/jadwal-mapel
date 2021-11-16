<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Siswa, JamPelajaran, Rombel, SiswaRombel, JadwalPelajaran};

class DashboardController extends Controller
{
    public function index(){
        $jam_pelajaran = JamPelajaran::orderBy('id', 'asc')->get();
        $siswa = Siswa::where('user_id', auth()->user()->id)->first();
        $siswa_rombel = SiswaRombel::where('siswa_id', $siswa->id)->first();
        $rombel = Rombel::findOrFail($siswa_rombel->rombel_id);
    
        $jadwal_pelajaran_senin = JadwalPelajaran::wherehas('jamPelajaran', function($query){
            $query->where('hari', 'Senin')->orderBy('jam_mulai', 'asc');
        })->where('rombel_id', $rombel->id)->get();

        $jadwal_pelajaran_selasa = JadwalPelajaran::wherehas('jamPelajaran', function($query){
            $query->where('hari', 'Selasa')->orderBy('jam_mulai', 'asc');
        })->where('rombel_id', $rombel->id)->get();

        $jadwal_pelajaran_rabu = JadwalPelajaran::wherehas('jamPelajaran', function($query){
            $query->where('hari', 'Rabu')->orderBy('jam_mulai', 'asc');
        })->where('rombel_id', $rombel->id)->get();

        $jadwal_pelajaran_kamis = JadwalPelajaran::wherehas('jamPelajaran', function($query){
            $query->where('hari', 'Kamis')->orderBy('jam_mulai', 'asc');
        })->where('rombel_id', $rombel->id)->get();

        $jadwal_pelajaran_jumat = JadwalPelajaran::wherehas('jamPelajaran', function($query){
            $query->where('hari', 'Jumat')->orderBy('jam_mulai', 'asc');
        })->where('rombel_id', $rombel->id)->get();

        $jadwal_pelajaran_sabtu = JadwalPelajaran::wherehas('jamPelajaran', function($query){
            $query->where('hari', 'Sabtu')->orderBy('jam_mulai', 'asc');
        })->where('rombel_id', $rombel->id)->get();   

        return view('apps.siswa.dashboard')->with('jadwal_pelajaran_senin', $jadwal_pelajaran_senin)
                                                        ->with('jadwal_pelajaran_selasa', $jadwal_pelajaran_selasa)
                                                        ->with('jadwal_pelajaran_rabu', $jadwal_pelajaran_rabu)
                                                        ->with('jadwal_pelajaran_kamis', $jadwal_pelajaran_kamis)
                                                        ->with('jadwal_pelajaran_jumat', $jadwal_pelajaran_jumat)
                                                        ->with('jadwal_pelajaran_sabtu', $jadwal_pelajaran_sabtu)
                                                        ->with('jam_pelajaran', $jam_pelajaran)
                                                        ->with('rombel', $rombel);
    }
}
