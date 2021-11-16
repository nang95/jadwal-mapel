@extends('layouts.app')

@section('title-page')
    Mata Pelajaran
@endsection

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.mata_pelajaran') }}">Mata Pelajaran</a></li>
    <li class="breadcrumb-item active">Edit Mata Pelajaran</li>
</ol>
@endsection

@section('content')
<div class="row">
    <!-- Left col -->
    <div class="col-md-8">
    <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mata Pelajaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.mata_pelajaran.update') }}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="id" value="{{ $mata_pelajaran->id }}">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ $mata_pelajaran->nama }}" required>
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