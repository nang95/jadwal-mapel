@extends('layouts.app')

@section('title-page')
    Guru
@endsection

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.guru') }}">Guru</a></li>
    <li class="breadcrumb-item active">Tambah Guru</li>
</ol>
@endsection

@section('content')
<div class="row">
    <!-- Left col -->
    <div class="col-md-8">
    <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Guru</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.guru.store') }}" method="POST">
                        @csrf @method('POST')
                        <div class="card-body">
                            <div class="form-group">
                              <label for="inisial">Inisial</label>
                              <input type="text" id="inisial" name="inisial" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" id="nip" name="nip" class="form-control" required>
                          </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" id="nama" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <input type="text" id="alamat" name="alamat" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="no_hp">No HP</label>
                              <input type="text" id="no_hp" name="no_hp" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="agama">Agama</label>
                              <select name="agama" id="agama" class="form-control" required>
                                <option value="">-Silahkan Pilih-</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Khatolik">Kristen Khatolik</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindhu">Hindhu</option>
                                <option value="Lainnya">Lainnya</option>
                              </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select name="jabatan_id" id="jabatan_id" class="form-control" required>
                                    <option value="">-Silahkan Pilih-</option>
                                    @foreach ($jabatan as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="text" id="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-danger">Batal</button>
                                </div>
                                <div class="col-sm-6" style="text-align: right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.col -->
</div>
@endsection