<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Session;

class MataPelajaranController extends Controller
{
    public function index(Request $request){
        $q_nama = $request->q_nama;
        $mata_pelajaran = MataPelajaran::orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $mata_pelajaran->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $mata_pelajaran = $mata_pelajaran->paginate();
        $skipped = ($mata_pelajaran->perPage() * $mata_pelajaran->currentPage()) - $mata_pelajaran->perPage();

        return view('apps.admin.mata-pelajaran.index')->with('mata_pelajaran', $mata_pelajaran)
                                               ->with('skipped', $skipped)
                                               ->with('q_nama', $q_nama);
    }

    public function create(){
        return view('apps.admin.mata-pelajaran.create');
    }

    public function store(Request $request){
        $mata_pelajaran = $request->all();

        MataPelajaran::create($mata_pelajaran);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.mata_pelajaran');
    }

    public function edit(MataPelajaran $mata_pelajaran){
        return view('apps.admin.mata-pelajaran.edit')->with('mata_pelajaran', $mata_pelajaran);
    }

    public function update(Request $request){
        $mata_pelajaran = MataPelajaran::findOrFail($request->id);

        $mata_pelajaran->update($request->all());

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.mata_pelajaran');
    }

    public function delete(Request $request){
        $mata_pelajaran = MataPelajaran::findOrFail($request->id);

        $mata_pelajaran->delete();
        return redirect()->route('admin.mata_pelajaran');
    }
}
