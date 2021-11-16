@extends('layouts.app')

@section('title-page')
    Sekolah
@endsection

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
    <li class="breadcrumb-item active">Tambah Sekolah</li>
</ol>
@endsection

@section('content')
<div class="row">
    <!-- Left col -->
    <div class="col-md-8">
    <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sekolah</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.sekolah.update') }}" method="POST">
                        <input type="hidden" name="id" value="{{ $sekolah->id }}">
                        @csrf @method('PUT')
                        <div class="card-body">
                          <div class="form-group">
                            <label for="tahun_ajaran">Tahun Ajaran</label>
                            <input type="text" name="tahun_ajaran" class="form-control" value="{{ $sekolah->tahun_ajaran }}" id="tahun_ajaran" required>
                          </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="semester">Semester</label>
                              <input type="text" name="semester" class="form-control" value="{{ $sekolah->semester }}" id="semester" required>
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