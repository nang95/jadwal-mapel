<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JamPelajaran;

class JamPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jam_pelajaran_senin = JamPelajaran::where('hari', 'Senin')->orderBy('jam_mulai')->get();
        $jam_pelajaran_selasa = JamPelajaran::where('hari', 'Selasa')->orderBy('jam_mulai')->get();
        $jam_pelajaran_rabu = JamPelajaran::where('hari', 'Rabu')->orderBy('jam_mulai')->get();
        $jam_pelajaran_kamis = JamPelajaran::where('hari', 'Kamis')->orderBy('jam_mulai')->get();
        $jam_pelajaran_jumat = JamPelajaran::where('hari', 'Jumat')->orderBy('jam_mulai')->get();
        $jam_pelajaran_sabtu = JamPelajaran::where('hari', 'Sabtu')->orderBy('jam_mulai')->get();

        return view('apps.admin.jam-pelajaran.index')->with('jam_pelajaran_senin', $jam_pelajaran_senin)
                                                     ->with('jam_pelajaran_selasa', $jam_pelajaran_selasa)
                                                     ->with('jam_pelajaran_rabu', $jam_pelajaran_rabu)
                                                     ->with('jam_pelajaran_kamis', $jam_pelajaran_kamis)
                                                     ->with('jam_pelajaran_jumat', $jam_pelajaran_jumat)
                                                     ->with('jam_pelajaran_sabtu', $jam_pelajaran_sabtu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        JamPelajaran::create([
            'hari' => $request->hari,
            'status' => $request->status,
            'les_ke' => $request->les_ke,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
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
        $jam_pelajaran = JamPelajaran::findOrFail($request->id);

        $jam_pelajaran->delete();
        return redirect()->back();
    }
}
