<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Guru, Kelas, Rombel};
use Session;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $rombel = Rombel::orderBy('id', 'asc');

        if (!empty($q_nama)) {
            $rombel->whereHas('guru', function($query) use($q_nama){
                $query->where('nama', 'LIKE', '%'.$q_nama.'%');
            });
        }

        $rombel = $rombel->paginate();
        $skipped = ($rombel->perPage() * $rombel->currentPage()) - $rombel->perPage();

        return view('apps.admin.rombel.index')->with('rombel', $rombel)
                                               ->with('skipped', $skipped)
                                               ->with('q_nama', $q_nama);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::get();
        $guru = Guru::get();

        return view('apps.admin.rombel.create')->with('kelas', $kelas)
                                               ->with('guru', $guru);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rombel = $request->all();

        Rombel::create($rombel);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.rombel');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rombel $rombel)
    {
        $kelas = Kelas::get();
        $guru = Guru::get();

        return view('apps.admin.rombel.edit')->with('kelas', $kelas)
                                             ->with('guru', $guru)
                                             ->with('rombel', $rombel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rombel = Rombel::findOrFail($request->id);

        $rombel->update($request->all());

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.rombel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rombel = Rombel::findOrFail($request->id);

        $rombel->delete();
        return redirect()->route('admin.rombel');
    }
}
