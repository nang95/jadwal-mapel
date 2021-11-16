<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tingkat;
use Session;

class TingkatController extends Controller
{
    public function index(Request $request){
        $q_nama = $request->q_nama;
        $tingkat = Tingkat::orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $tingkat->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $tingkat = $tingkat->paginate();
        $skipped = ($tingkat->perPage() * $tingkat->currentPage()) - $tingkat->perPage();

        return view('apps.admin.tingkat.index')->with('tingkat', $tingkat)
                                               ->with('skipped', $skipped)
                                               ->with('q_nama', $q_nama);
    }

    public function create(){
        return view('apps.admin.tingkat.create');
    }

    public function store(Request $request){
        $tingkat = $request->all();

        Tingkat::create($tingkat);
        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.tingkat');
    }

    public function edit(Tingkat $tingkat){
        return view('apps.admin.tingkat.edit')->with('tingkat', $tingkat);
    }

    public function update(Request $request){
        $tingkat = Tingkat::findOrFail($request->id);

        $tingkat->update($request->all());

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.tingkat');
    }

    public function delete(Request $request){
        $tingkat = Tingkat::findOrFail($request->id);

        $tingkat->delete();
        return redirect()->route('admin.tingkat');
    }
}
