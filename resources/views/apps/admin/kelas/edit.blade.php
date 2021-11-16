@extends('layouts.app')

@section('title-page')
    Kelas
@endsection

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.kelas') }}">Kelas</a></li>
    <li class="breadcrumb-item active">Edit Kelas</li>
</ol>
@endsection

@section('content')
<div class="row">
    <!-- Left col -->
    <div class="col-md-8">
    <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kelas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.kelas.update') }}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="id" value="{{ $kelas->id }}">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $kelas->nama }}" id="nama" required>
                          </div>
                          <div class="form-group">
                            <label for="tingkat">Tingkat</label>
                            <select name="tingkat_id" id="tingkat_id" class="form-control" required>
                                <option value="">-Silahkan Pilih-</option>
                                @foreach ($tingkat as $item)
                                  <option value="{{ $item->id }}" @if ($kelas->tingkat_id == $item->id)
                                      selected
                                  @endif>{{ $item->nama }}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{ route('admin.kelas') }}">
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