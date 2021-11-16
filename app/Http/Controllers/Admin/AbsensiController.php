<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Siswa, Absensi};
use Session;

class AbsensiController extends Controller
{
    public function index(Request $request){
        $q_nama = $request->q_nama;
        $absensi = Siswa::whereNotIn('id', function($query){
            $query->select('siswa_id')->from('absensis')->where('tanggal', date('Y-m-d'));
        });

        if (!empty($q_nama)) {
            $absensi->where('name', 'LIKE', '%'.$q_nama.'%');
        }

        $absensi = $absensi->paginate();
        $skipped = ($absensi->perPage() * $absensi->currentPage()) - $absensi->perPage();

        return view('apps.admin.absensi.index')->with('absensi', $absensi)
                                               ->with('skipped', $skipped)
                                               ->with('q_nama', $q_nama);
    }

    public function saveAll(Request $request){
        $hadir = explode(';', $request->hadir);
        foreach ($hadir as $key) {
            if(!empty($key)){
                $siswa = Siswa::findOrFail($key);
            
                Absensi::create([
                    'siswa_id' => $siswa->id,
                    'tanggal' => date('Y-m-d'),
                    'status' => 'H',
                ]);
            }
        }

        $sakit = explode(';', $request->sakit);
        foreach ($sakit as $key) {
            if(!empty($key)){
                $siswa = Siswa::findOrFail($key);
            
                Absensi::create([
                    'siswa_id' => $siswa->id,
                    'tanggal' => date('Y-m-d'),
                    'status' => 'S',
                ]);
            }
        }

        $izin = explode(';', $request->izin);
        foreach ($izin as $key) {
            if(!empty($key)){
                $siswa = Siswa::findOrFail($key);
            
                Absensi::create([
                    'siswa_id' => $siswa->id,
                    'tanggal' => date('Y-m-d'),
                    'status' => 'I',
                ]);
            }
        }

        $alpha = explode(';', $request->alpha);
        foreach ($alpha as $key) {
            if(!empty($key)){
                $siswa = Siswa::findOrFail($key);
            
                Absensi::create([
                    'siswa_id' => $siswa->id,
                    'tanggal' => date('Y-m-d'),
                    'status' => 'I',
                ]);
            }
        }

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->back();
    }
}
