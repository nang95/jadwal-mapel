<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{JamPelajaran, JadwalPelajaran, Rombel, GuruMataPelajaran};

class JadwalPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jam_pelajaran = JamPelajaran::orderBy('id', 'asc')->get();
        $rombel = Rombel::orderBy('id', 'asc')->get();
        $guru_mata_pelajaran = GuruMataPelajaran::orderBy('id', 'asc')->get();

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

        return view('apps.admin.jadwal-pelajaran.index')->with('jadwal_pelajaran_senin', $jadwal_pelajaran_senin)
                                                        ->with('jadwal_pelajaran_selasa', $jadwal_pelajaran_selasa)
                                                        ->with('jadwal_pelajaran_rabu', $jadwal_pelajaran_rabu)
                                                        ->with('jadwal_pelajaran_kamis', $jadwal_pelajaran_kamis)
                                                        ->with('jadwal_pelajaran_jumat', $jadwal_pelajaran_jumat)
                                                        ->with('jadwal_pelajaran_sabtu', $jadwal_pelajaran_sabtu)
                                                        ->with('jam_pelajaran', $jam_pelajaran)
                                                        ->with('guru_mata_pelajaran', $guru_mata_pelajaran)
                                                        ->with('rombel', $rombel)
                                                        ->with('q_rombel', $q_rombel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        JadwalPelajaran::create([
            'guru_mata_pelajaran_id' => $request->guru_mata_pelajaran_id,
            'jam_pelajaran_id' => $request->jam_pelajaran_id,
            'rombel_id' => $request->rombel_id,
        ]);
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $jadwal_pelajaran = JadwalPelajaran::findOrFail($request->id);
        $jadwal_pelajaran->delete();

        return redirect()->back();
    }
}
