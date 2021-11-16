<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{MataPelajaran, GuruMataPelajaran, Guru, Kelas};
use Session;

class GuruMataPelajaranController extends Controller
{
    public function index(Request $request, MataPelajaran $mata_pelajaran){
        $q_nama = $request->q_nama;
        $guru_mata_pelajaran = GuruMataPelajaran::where('mata_pelajaran_id', $mata_pelajaran->id)->orderBy('id', 'desc');

        if (!empty($q_nama)) {
            $guru_mata_pelajaran->whereHas('guru', function($query) use($q_nama){
                $query->where('nama', 'LIKE', '%'.$q_nama.'%');
            });
        }

        $guru_mata_pelajaran = $guru_mata_pelajaran->paginate();
        $skipped = ($guru_mata_pelajaran->perPage() * $guru_mata_pelajaran->currentPage()) - $guru_mata_pelajaran->perPage();

        return view('apps.admin.guru-mata-pelajaran.index')->with('guru_mata_pelajaran', $guru_mata_pelajaran)
                                                           ->with('mata_pelajaran', $mata_pelajaran)
                                                           ->with('skipped', $skipped)
                                                           ->with('q_nama', $q_nama);
    }

    public function create(MataPelajaran $mata_pelajaran){
        $guru = Guru::get();
        $kelas = Kelas::get();
        return view('apps.admin.guru-mata-pelajaran.create')->with('mata_pelajaran', $mata_pelajaran)
                                                            ->with('guru', $guru)
                                                            ->with('kelas', $kelas);
    }

    public function store(Request $request){
        $guru_mata_pelajaran = $request->all();

        GuruMataPelajaran::create($guru_mata_pelajaran);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.mata_pelajaran.guru_mapel', $request->mata_pelajaran_id);
    }

    public function edit(GuruMataPelajaran $guru_mata_pelajaran, MataPelajaran $mata_pelajaran){
        $guru = Guru::get();
        $kelas = Kelas::get();
        return view('apps.admin.guru-mata-pelajaran.edit')->with('mata_pelajaran', $mata_pelajaran)
                                                          ->with('guru_mata_pelajaran', $guru_mata_pelajaran)
                                                          ->with('kelas', $kelas)
                                                          ->with('guru', $guru);
    }

    public function update(Request $request){
        $guru_mata_pelajaran = GuruMataPelajaran::findOrFail($request->id);

        $guru_mata_pelajaran->update($request->all());

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.mata_pelajaran.guru_mapel', $request->mata_pelajaran_id);
    }

    public function delete(Request $request){
        $guru_mata_pelajaran = GuruMataPelajaran::findOrFail($request->id);

        $guru_mata_pelajaran->delete();
        return redirect()->route('admin.mata_pelajaran.guru_mapel', $request->mata_pelajaran_id);
    }
}
