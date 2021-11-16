<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use Session;

class JabatanController extends Controller
{
    public function index(Request $request){
        $q_nama = $request->q_nama;
        $jabatan = Jabatan::orderBy('name', 'asc');

        if (!empty($q_nama)) {
            $jabatan->where('name', 'LIKE', '%'.$q_nama.'%');
        }

        $jabatan = $jabatan->paginate();
        $skipped = ($jabatan->perPage() * $jabatan->currentPage()) - $jabatan->perPage();

        return view('apps.admin.jabatan.index')->with('jabatan', $jabatan)
                                               ->with('skipped', $skipped)
                                               ->with('q_nama', $q_nama);
    }

    public function create(){
        return view('apps.admin.jabatan.create');
    }

    public function store(Request $request){
        $jabatan = $request->all();

        Jabatan::create($jabatan);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.jabatan');
    }

    public function edit(Jabatan $jabatan){
        return view('apps.admin.jabatan.edit')->with('jabatan', $jabatan);
    }

    public function update(Request $request){
        $jabatan = Jabatan::findOrFail($request->id);

        $jabatan->update($request->all());

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.jabatan');
    }

    public function delete(Request $request){
        $jabatan = Jabatan::findOrFail($request->id);

        $jabatan->delete();
        return redirect()->route('admin.jabatan');
    }
}
