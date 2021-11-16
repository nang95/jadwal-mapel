@extends('layouts.app')

@section('title-page')
    Siswa
@endsection

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.siswa') }}">Siswa</a></li>
    <li class="breadcrumb-item active">Edit Siswa</li>
</ol>
@endsection

@section('content')
<div class="row">
    <!-- Left col -->
    <div class="col-md-8">
    <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Siswa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.siswa.update') }}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="id" value="{{ $siswa->id }}">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="nisn">Nisn</label>
                            <input type="text" id="nisn" name="nisn" class="form-control" value="{{ $siswa->nisn }}" required>
                          </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" id="nama" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $siswa->alamat }}" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="no_hp">No Hp</label>
                              <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ $siswa->no_hp }}" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="agama">Agama</label>
                              <select name="agama" id="agama" class="form-control" required>
                                <option value="">-Silahkan Pilih-</option>
                                <option value="Islam" 
                                    @if ($siswa->agama == "Islam")
                                        selected
                                    @endif>Islam</option>
                                    <option value="Kristen Khatolik"
                                    @if ($siswa->agama == "Kristen Khatolik")
                                        selected
                                    @endif>Kristen Khatolik</option>
                                    <option value="Kristen Protestan"
                                    @if ($siswa->agama == "Kristen Protestan")
                                        selected
                                    @endif>Kristen Protestan</option>
                                    <option value="Budha"
                                    @if ($siswa->agama == "Budha")
                                        selected
                                    @endif>Budha</option>
                                    <option value="Hindhu"
                                    @if ($siswa->agama == "Hindhu")
                                        selected
                                    @endif>Hindhu</option>
                                    <option value="Konghucu"
                                    @if ($siswa->agama == "Lainnya")
                                        selected
                                    @endif>Lainnya</option>
                              </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <a href="{{ route('admin.siswa') }}">
                                    <button type="button" class="btn btn-danger">Batal</button>
                                </a>
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