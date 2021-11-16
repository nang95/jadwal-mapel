@extends('layouts.app')

@section('title-page')
    Dashboard
@endsection

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Default</li>
</ol>
@endsection

@section('content')
<div class="row">
    <!-- Left col -->
    <div class="col-md-8">
    <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Jadwal Dini Hari</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th scope="col">Guru</th>
                            <th scope="col">Les Ke</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jam</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($jadwal_pelajaran) == 0)
                            <tr>
                                <td colspan="4" style="text-center">Tidak ada jadwal pelajaran hari ini.</td>
                            </tr>
                        @endif
                        @foreach ($jadwal_pelajaran as $data_jadwal_pelajaran)
                        <tr>
                            <td>{{ $data_jadwal_pelajaran->guruMataPelajaran->guru->inisial }}</td>
                            <td>{{ $data_jadwal_pelajaran->jamPelajaran->les_ke }}</td>
                            <td>{{ $data_jadwal_pelajaran->rombel->kelas->nama }}</td>
                            <td>{{ $data_jadwal_pelajaran->jamPelajaran->jam_mulai }} - {{ $data_jadwal_pelajaran->jamPelajaran->jam_selesai }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.col -->

    <div class="col-md-4">
    
        <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Jumlah Siswa</span>
            <span class="info-box-number">{{ $siswa }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-chalkboard"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Jumlah Kelas</span>
            <span class="info-box-number">{{ $kelas }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
  
    </div>
    <!-- /.col -->
</div>
@endsection