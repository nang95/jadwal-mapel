@extends('layouts.app')

@section('title-page')
   Guru Mata Pelajaran
@endsection

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.mata_pelajaran') }}">Mata Pelajaran</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.mata_pelajaran.guru_mapel', $mata_pelajaran->id) }}">Guru Mata Pelajaran</a></li>
    <li class="breadcrumb-item active">Tambah Guru Mata Pelajaran</li>
</ol>
@endsection

@section('content')
<div class="row">
    <!-- Left col -->
    <div class="col-md-8">
    <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Guru Mata Pelajaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.mata_pelajaran.guru_mapel.store') }}" method="POST">
                        @csrf @method('POST')
                        <input type="hidden" name="mata_pelajaran_id" value="{{ $mata_pelajaran->id }}">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="nama">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control" required>
                                <option value="">-Silahkan Pilih-</option>
                                @foreach ($kelas as $item)
                                  <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->tingkat->nama }}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="nama">Guru Mapel</label>
                              <select name="guru_id" id="guru_id" class="form-control" required>
                                <option value="">-Silahkan Pilih-</option>
                                @foreach ($guru as $item)
                                  <option value="{{ $item->id }}">{{ $item->nip }} - {{ $item->nama }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{ route('admin.mata_pelajaran.guru_mapel', $mata_pelajaran->id) }}">
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