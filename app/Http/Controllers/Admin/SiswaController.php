<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Siswa, Role};
use Illuminate\Support\Facades\Hash;
use Session;

class SiswaController extends Controller
{
    public function index(Request $request){
        $q_nama = $request->q_nama;
        $siswa = Siswa::orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $siswa->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $siswa = $siswa->paginate();
        $skipped = ($siswa->perPage() * $siswa->currentPage()) - $siswa->perPage();

        return view('apps.admin.siswa.index')->with('siswa', $siswa)
                                               ->with('skipped', $skipped)
                                               ->with('q_nama', $q_nama);
    }

    public function create(){
        return view('apps.admin.siswa.create');
    }

    public function store(Request $request){
        $siswa = $request->all();

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user = User::findOrFail($user->id);
        $role = Role::where('name', 'siswa')->first();
        
        // attach & detach
        $user->roles()->detach($role->id);
        $user->roles()->attach($role->id);

        $siswa['user_id'] = $user->id;
        
        Siswa::create($siswa);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.siswa');
    }

    public function edit(Siswa $siswa){
        return view('apps.admin.siswa.edit')->with('siswa', $siswa);
    }

    public function update(Request $request){
        $siswa = Siswa::findOrFail($request->id);

        $siswa->update($request->all());

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.siswa');
    }

    public function delete(Request $request){
        $siswa = Siswa::findOrFail($request->id);

        $siswa->delete();
        return redirect()->route('admin.siswa');
    }
}
