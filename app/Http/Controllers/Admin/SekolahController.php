<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sekolah;
use Session;

class SekolahController extends Controller
{
    public function index(){
        $sekolah = Sekolah::first();
        
        if ($sekolah == null) {
            $sekolah = Sekolah::create([
                'tahun_ajaran' => '2020/2021',
                'semester' => 'Ganjil'
            ]);
        }

        return view('apps.admin.sekolah.index')->with('sekolah', $sekolah);
    }

    public function update(Request $request){
        $sekolah = Sekolah::findOrFail($request->id);

        $sekolah->update($request->all());

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->back();
    }
}
