<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Rombel, Siswa, SiswaRombel};
use Session;

class SiswaRombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Rombel $rombel, Request $request)
    {
        $q_nama_siswa = $request->q_nama_siswa;
        $q_nama_siswa_rombel = $request->q_nama_siswa_rombel;

        $siswa_rombel = SiswaRombel::where('rombel_id', $rombel->id);

        if (!empty($q_nama_siswa)) {
            $siswa_rombel->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $siswa_rombel = $siswa_rombel->paginate();
        $skipped_siswa_rombel = ($siswa_rombel->perPage() * $siswa_rombel->currentPage()) - $siswa_rombel->perPage();

        $siswa = Siswa::whereNotIn('id', function($query){
            $query->select('siswa_id')->from('siswa_rombels');
        });

        if (!empty($q_nama_siswa)) {
            $siswa->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $siswa = $siswa->paginate();
        $skipped_siswa = ($siswa->perPage() * $siswa->currentPage()) - $siswa->perPage();

        return view('apps.admin.siswa-rombel.index')->with('siswa', $siswa)
                                                    ->with('rombel', $rombel)
                                                    ->with('siswa_rombel', $siswa_rombel)
                                                    ->with('skipped_siswa', $skipped_siswa)
                                                    ->with('skipped_siswa_rombel', $skipped_siswa_rombel)
                                                    ->with('q_nama_siswa', $q_nama_siswa)
                                                    ->with('q_nama_siswa_rombel', $q_nama_siswa_rombel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa_rombel = $request->all();
        SiswaRombel::create($siswa_rombel);
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
        $siswa_rombel = SiswaRombel::findOrFail($request->id);
        $siswa_rombel->delete();

        return redirect()->back();
    }

    public function saveAll(Request $request){
        $data = explode(';', $request->siswa_id);
        foreach ($data as $key) {
            if(!empty($key)){
                $siswa = Siswa::findOrFail($key);
            
                SiswaRombel::create([
                    'siswa_id' => $siswa->id,
                    'rombel_id' => $request->rombel_id
                ]);
            }
        }

        Session::flash('flash_message','Data telah ditambah');
        return redirect()->back();
    }

    public function deleteAll(Request $request){
        $data = explode(';', $request->siswa_id);
        foreach ($data as $key) {
            if(!empty($key)){
                $siswa = SiswaRombel::Where('siswa_id', $key)
                                        ->where('rombel_id', $request->rombel_id)->first();
            
                $siswa->delete();
            }
        }

        Session::flash('flash_message','Data telah disimpan');
        return redirect()->back();
    }
}
