<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/', function(){})->middleware('checkUserLevel');
    
    Route::namespace('Admin')->prefix('/admin')->name('admin.')->group(function(){
        Route::get('/', 'DashboardController@index')->name('/');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
        // Sekolah
        Route::get('sekolah', 'SekolahController@index')->name('sekolah');
        Route::put('sekolah', 'SekolahController@update')->name('sekolah.update');
    
        // Jabatan
        Route::get('jabatan', 'JabatanController@index')->name('jabatan');
        Route::get('jabatan/create', 'JabatanController@create')->name('jabatan.create');
        Route::get('jabatan/edit/{jabatan}', 'JabatanController@edit')->name('jabatan.edit');
        Route::put('jabatan', 'JabatanController@update')->name('jabatan.update');
        Route::post('jabatan', 'JabatanController@store')->name('jabatan.store');
        Route::delete('jabatan', 'JabatanController@delete')->name('jabatan.delete');
    
        // Guru
        Route::get('guru', 'GuruController@index')->name('guru');
        Route::get('guru/create', 'GuruController@create')->name('guru.create');
        Route::get('guru/edit/{guru}', 'GuruController@edit')->name('guru.edit');
        Route::put('guru', 'GuruController@update')->name('guru.update');
        Route::post('guru', 'GuruController@store')->name('guru.store');
        Route::delete('guru', 'GuruController@delete')->name('guru.delete');
        
        // Siswa
        Route::get('siswa', 'SiswaController@index')->name('siswa');
        Route::get('siswa/create', 'SiswaController@create')->name('siswa.create');
        Route::get('siswa/edit/{siswa}', 'SiswaController@edit')->name('siswa.edit');
        Route::put('siswa', 'SiswaController@update')->name('siswa.update');
        Route::post('siswa', 'SiswaController@store')->name('siswa.store');
        Route::delete('siswa', 'SiswaController@delete')->name('siswa.delete');
    
        // Mata Pelajaran
        Route::get('mata_pelajaran', 'MataPelajaranController@index')->name('mata_pelajaran');
        Route::get('mata_pelajaran/create', 'MataPelajaranController@create')->name('mata_pelajaran.create');
        Route::get('mata_pelajaran/edit/{mata_pelajaran}', 'MataPelajaranController@edit')->name('mata_pelajaran.edit');
        Route::put('mata_pelajaran', 'MataPelajaranController@update')->name('mata_pelajaran.update');
        Route::post('mata_pelajaran', 'MataPelajaranController@store')->name('mata_pelajaran.store');
        Route::delete('mata_pelajaran', 'MataPelajaranController@delete')->name('mata_pelajaran.delete');

        // Guru Mapel
        Route::get('mata_pelajaran/guru_mapel/{mata_pelajaran}', 'GuruMataPelajaranController@index')->name('mata_pelajaran.guru_mapel');
        Route::get('mata_pelajaran/guru_mapel/create/{mata_pelajaran}', 'GuruMataPelajaranController@create')->name('mata_pelajaran.guru_mapel.create');
        Route::get('mata_pelajaran/edit/guru_mapel/{guru_mata_pelajaran}/{mata_pelajaran}', 'GuruMataPelajaranController@edit')->name('mata_pelajaran.guru_mapel.edit');
        Route::put('mata_pelajaran/guru_mapel', 'GuruMataPelajaranController@update')->name('mata_pelajaran.guru_mapel.update');
        Route::post('mata_pelajaran/guru_mapel', 'GuruMataPelajaranController@store')->name('mata_pelajaran.guru_mapel.store');
        Route::delete('mata_pelajaran/guru_mapel', 'GuruMataPelajaranController@delete')->name('mata_pelajaran.guru_mapel.delete');
    
        // Tingkat
        Route::get('tingkat', 'TingkatController@index')->name('tingkat');
        Route::get('tingkat/create', 'TingkatController@create')->name('tingkat.create');
        Route::get('tingkat/edit/{tingkat}', 'TingkatController@edit')->name('tingkat.edit');
        Route::put('tingkat', 'TingkatController@update')->name('tingkat.update');
        Route::post('tingkat', 'TingkatController@store')->name('tingkat.store');
        Route::delete('tingkat', 'TingkatController@delete')->name('tingkat.delete');
    
        // Kelas
        Route::get('kelas', 'KelasController@index')->name('kelas');
        Route::get('kelas/create', 'KelasController@create')->name('kelas.create');
        Route::get('kelas/edit/{kelas}', 'KelasController@edit')->name('kelas.edit');
        Route::put('kelas', 'KelasController@update')->name('kelas.update');
        Route::post('kelas', 'KelasController@store')->name('kelas.store');
        Route::delete('kelas', 'KelasController@delete')->name('kelas.delete');
        
        // Rombel
        Route::get('rombel', 'RombelController@index')->name('rombel');
        Route::get('rombel/create', 'RombelController@create')->name('rombel.create');
        Route::get('rombel/edit/{rombel}', 'RombelController@edit')->name('rombel.edit');
        Route::put('rombel', 'RombelController@update')->name('rombel.update');
        Route::post('rombel', 'RombelController@store')->name('rombel.store');
        Route::delete('rombel', 'RombelController@delete')->name('rombel.delete');
    
        // Siswa Rombel
        Route::get('siswa-rombel/{rombel}', 'SiswaRombelController@index')->name('rombel.siswa-rombel');
        Route::post('siswa-rombel', 'SiswaRombelController@store')->name('rombel.siswa-rombel.store');
        Route::delete('siswa-rombel', 'SiswaRombelController@delete')->name('rombel.siswa-rombel.delete');
        Route::post('siswa-rombel/hapus-semua', 'SiswaRombelController@deleteAll')->name('rombel.siswa-rombel.delete-all');
        Route::post('siswa-rombel/simpan-semua', 'SiswaRombelController@saveAll')->name('rombel.siswa-rombel.save-all');

        // Rombel
        Route::get('jam_pelajaran', 'JamPelajaranController@index')->name('jam_pelajaran');
        Route::get('jam_pelajaran/create', 'JamPelajaranController@create')->name('jam_pelajaran.create');
        Route::get('jam_pelajaran/edit/{jam_pelajaran}', 'JamPelajaranController@edit')->name('jam_pelajaran.edit');
        Route::put('jam_pelajaran', 'JamPelajaranController@update')->name('jam_pelajaran.update');
        Route::post('jam_pelajaran', 'JamPelajaranController@store')->name('jam_pelajaran.store');
        Route::delete('jam_pelajaran', 'JamPelajaranController@delete')->name('jam_pelajaran.delete');

        // Jadwal Pelajaran 
        Route::get('jadwal_pelajaran', 'JadwalPelajaranController@index')->name('jadwal_pelajaran');
        Route::get('jadwal_pelajaran/create', 'JadwalPelajaranController@create')->name('jadwal_pelajaran.create');
        Route::get('jadwal_pelajaran/edit/{jadwal_pelajaran}', 'JadwalPelajaranController@edit')->name('jadwal_pelajaran.edit');
        Route::put('jadwal_pelajaran', 'JadwalPelajaranController@update')->name('jadwal_pelajaran.update');
        Route::post('jadwal_pelajaran', 'JadwalPelajaranController@store')->name('jadwal_pelajaran.store');
        Route::delete('jadwal_pelajaran', 'JadwalPelajaranController@delete')->name('jadwal_pelajaran.delete');
    });

    Route::namespace('Guru')->prefix('/guru')->name('guru.')->group(function(){
        Route::get('/', 'DashboardController@index')->name('/');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        // Jadwal Pelajaran
        Route::get('jadwal_pelajaran', 'JadwalPelajaranController@index')->name('jadwal_pelajaran');
        Route::get('jadwal_pelajaran/create', 'JadwalPelajaranController@create')->name('jadwal_pelajaran.create');
        Route::get('jadwal_pelajaran/edit/{jadwal_pelajaran}', 'JadwalPelajaranController@edit')->name('jadwal_pelajaran.edit');
        Route::put('jadwal_pelajaran', 'JadwalPelajaranController@update')->name('jadwal_pelajaran.update');
        Route::post('jadwal_pelajaran', 'JadwalPelajaranController@store')->name('jadwal_pelajaran.store');
        Route::delete('jadwal_pelajaran', 'JadwalPelajaranController@delete')->name('jadwal_pelajaran.delete');
    });
    
    Route::namespace('Siswa')->prefix('/siswa')->name('siswa.')->group(function(){
        Route::get('/', 'DashboardController@index')->name('/');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        
        // Jadwal Pelajaran
        Route::get('jadwal_pelajaran', 'JadwalPelajaranController@index')->name('jadwal_pelajaran');
        Route::get('jadwal_pelajaran/create', 'JadwalPelajaranController@create')->name('jadwal_pelajaran.create');
        Route::get('jadwal_pelajaran/edit/{jadwal_pelajaran}', 'JadwalPelajaranController@edit')->name('jadwal_pelajaran.edit');
        Route::put('jadwal_pelajaran', 'JadwalPelajaranController@update')->name('jadwal_pelajaran.update');
        Route::post('jadwal_pelajaran', 'JadwalPelajaranController@store')->name('jadwal_pelajaran.store');
        Route::delete('jadwal_pelajaran', 'JadwalPelajaranController@delete')->name('jadwal_pelajaran.delete');
    });
});
