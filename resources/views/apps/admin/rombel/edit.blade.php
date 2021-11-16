@extends('layouts.app')

@section('title-page')
    Rombel
@endsection

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.rombel') }}">Rombel</a></li>
    <li class="breadcrumb-item active">Tambah Rombel</li>
</ol>
@endsection

@section('content')
<div class="row">
    <!-- Left col -->
    <div class="col-md-8">
    <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Rombel</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.rombel.update') }}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="id" value="{{ $rombel->id }}">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="guru_id">Wali Kelas</label>
                            <select name="guru_id" id="guru_id" class="form-control" required>
                                <option value="">-Silahkan Pilih-</option>
                                @foreach ($guru as $item)
                                  <option value="{{ $item->id }}"
                                    @if ($rombel->guru_id == $item->id)
                                        selected
                                    @endif>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control" required>
                                <option value="">-Silahkan Pilih-</option>
                                @foreach ($kelas as $item)
                                  <option value="{{ $item->id }}"
                                    @if ($rombel->kelas_id == $item->id)
                                        selected
                                    @endif>{{ $item->nama }}</option>
                                @endforeach
                            </select>
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