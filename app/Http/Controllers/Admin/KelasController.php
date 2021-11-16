<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Tingkat, Kelas};
use Session;

class KelasController extends Controller
{
    public function index(Request $request){
        $q_nama = $request->q_nama;
        $kelas = Kelas::orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $kelas->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $kelas = $kelas->paginate();
        $skipped = ($kelas->perPage() * $kelas->currentPage()) - $kelas->perPage();

        return view('apps.admin.kelas.index')->with('kelas', $kelas)
                                               ->with('skipped', $skipped)
                                               ->with('q_nama', $q_nama);
    }

    public function create(){
        $tingkat = Tingkat::orderBy('nama', 'asc')->get();
        return view('apps.admin.kelas.create')->with('tingkat', $tingkat);
    }

    public function store(Request $request){
        $kelas = $request->all();

        Kelas::create($kelas);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.kelas');
    }

    public function edit(Kelas $kelas){
        $tingkat = Tingkat::orderBy('nama', 'asc')->get();

        return view('apps.admin.kelas.edit')->with('kelas', $kelas)
                                           ->with('tingkat', $tingkat);
    }

    public function update(Request $request){
        $kelas = Kelas::findOrFail($request->id);

        $kelas->update($request->all());

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.kelas');
    }

    public function delete(Request $request){
        $kelas = Kelas::findOrFail($request->id);

        $kelas->delete();
        return redirect()->route('admin.kelas');
    }
}
