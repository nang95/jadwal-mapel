<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{JadwalPelajaran, JamPelajaran, Guru, Rombel};

class JadwalPelajaranController extends Controller
{
    public function index(Request $request){
        $jam_pelajaran = JamPelajaran::orderBy('id', 'asc')->get();
        $guru = Guru::where('user_id', auth()->user()->id)->first();
        $rombel = Rombel::where('guru_id', $guru->id)->get();
        
        $q_rombel = $request->q_rombel;

        $jadwal_pelajaran_senin = [];
        $jadwal_pelajaran_selasa = [];
        $jadwal_pelajaran_rabu = [];
        $jadwal_pelajaran_kamis = [];
        $jadwal_pelajaran_jumat = [];
        $jadwal_pelajaran_sabtu = [];
        
        if (!empty($q_rombel)) {
            $jadwal_pelajaran_senin = JadwalPelajaran::wherehas('jamPelajaran', function($query){
                $query->where('hari', 'Senin')->orderBy('jam_mulai', 'asc');
            })->where('rombel_id', $q_rombel)->get();
    
            $jadwal_pelajaran_selasa = JadwalPelajaran::wherehas('jamPelajaran', function($query){
                $query->where('hari', 'Selasa')->orderBy('jam_mulai', 'asc');
            })->where('rombel_id', $q_rombel)->get();
    
            $jadwal_pelajaran_rabu = JadwalPelajaran::wherehas('jamPelajaran', function($query){
                $query->where('hari', 'Rabu')->orderBy('jam_mulai', 'asc');
            })->where('rombel_id', $q_rombel)->get();
    
            $jadwal_pelajaran_kamis = JadwalPelajaran::wherehas('jamPelajaran', function($query){
                $query->where('hari', 'Kamis')->orderBy('jam_mulai', 'asc');
            })->where('rombel_id', $q_rombel)->get();
    
            $jadwal_pelajaran_jumat = JadwalPelajaran::wherehas('jamPelajaran', function($query){
                $query->where('hari', 'Jumat')->orderBy('jam_mulai', 'asc');
            })->where('rombel_id', $q_rombel)->get();
    
            $jadwal_pelajaran_sabtu = JadwalPelajaran::wherehas('jamPelajaran', function($query){
                $query->where('hari', 'Sabtu')->orderBy('jam_mulai', 'asc');
            })->where('rombel_id', $q_rombel)->get();   
        }

        return view('apps.guru.jadwal-pelajaran.index')->with('jadwal_pelajaran_senin', $jadwal_pelajaran_senin)
                                                        ->with('jadwal_pelajaran_selasa', $jadwal_pelajaran_selasa)
                                                        ->with('jadwal_pelajaran_rabu', $jadwal_pelajaran_rabu)
                                                        ->with('jadwal_pelajaran_kamis', $jadwal_pelajaran_kamis)
                                                        ->with('jadwal_pelajaran_jumat', $jadwal_pelajaran_jumat)
                                                        ->with('jadwal_pelajaran_sabtu', $jadwal_pelajaran_sabtu)
                                                        ->with('jam_pelajaran', $jam_pelajaran)
                                                        ->with('rombel', $rombel)
                                                        ->with('q_rombel', $q_rombel);
    }
}
    