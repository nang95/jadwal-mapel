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
                        <input type="hidden" name="id" value="{{ $guru->id }}">
                        @csrf @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                              <label for="inisial">Inisial</label>
                              <input type="text" id="inisial" name="inisial" value="{{ $guru->inisial }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $guru->nama }}" id="name" required>
                          </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <input type="text" id="alamat" name="alamat" value="{{ $guru->alamat }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="no_hp">No HP</label>
                              <input type="text" id="no_hp" name="no_hp" value="{{ $guru->no_hp }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="agama">Agama</label>
                              <select name="agama" id="agama" class="form-control" required>
                                <option value="">-Silahkan Pilih-</option>
                                <option value="Islam" 
                                @if ($guru->agama == "Islam")
                                    selected
                                @endif>Islam</option>
                                <option value="Kristen Khatolik"
                                @if ($guru->agama == "Kristen Khatolik")
                                    selected
                                @endif>Kristen Khatolik</option>
                                <option value="Kristen Protestan"
                                @if ($guru->agama == "Kristen Protestan")
                                    selected
                                @endif>Kristen Protestan</option>
                                <option value="Budha"
                                @if ($guru->agama == "Budha")
                                    selected
                                @endif>Budha</option>
                                <option value="Hindhu"
                                @if ($guru->agama == "Hindhu")
                                    selected
                                @endif>Hindhu</option>
                                <option value="Lainnya"
                                @if ($guru->agama == "Lainnya")
                                    selected
                                @endif>Lainnya</option>
                              </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select name="jabatan_id" id="jabatan_id" class="form-control" required>
                                    <option value="">-Silahkan Pilih-</option>
                                    @foreach ($jabatan as $item)
                                    <option value="{{ $item->id }}"
                                        @if ($item->id == $guru->jabatan_id)
                                            selected
                                        @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{ route('admin.guru') }}">
                                        <button type="button" class="btn btn-danger">Batal</button>
                                    </a>
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