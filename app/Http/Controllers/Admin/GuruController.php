<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Guru, Jabatan, User, Role};
use Session;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index(Request $request){
        $q_nama = $request->q_nama;
        $guru = Guru::orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $guru->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $guru = $guru->paginate();
        $skipped = ($guru->perPage() * $guru->currentPage()) - $guru->perPage();

        return view('apps.admin.guru.index')->with('guru', $guru)
                                               ->with('skipped', $skipped)
                                               ->with('q_nama', $q_nama);
    }

    public function create(){
        $jabatan = Jabatan::orderBy('name', 'asc')->get();
        return view('apps.admin.guru.create')->with('jabatan', $jabatan);
    }

    public function store(Request $request){
        $guru = $request->all();

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user = User::findOrFail($user->id);
        $role = Role::where('name', 'guru')->first();
        
        // attach & detach
        $user->roles()->detach($role->id);
        $user->roles()->attach($role->id);

        $guru['user_id'] = $user->id;

        Guru::create($guru);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.guru');
    }

    public function edit(Guru $guru){
        $jabatan = Jabatan::orderBy('name', 'asc')->get();

        return view('apps.admin.guru.edit')->with('guru', $guru)
                                           ->with('jabatan', $jabatan);
    }

    public function update(Request $request){
        $guru = Guru::findOrFail($request->id);

        $guru->update($request->all());

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.guru');
    }

    public function delete(Request $request){
        $guru = Guru::findOrFail($request->id);

        $guru->delete();
        return redirect()->route('admin.guru');
    }
}
