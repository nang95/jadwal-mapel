@extends('layouts.app')

@section('title-page')
    Jam Pelajaran
@endsection

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.jam_pelajaran') }}">Jam Pelajaran</a></li>
    <li class="breadcrumb-item active">Jam Pelajaran</li>
</ol>
@endsection

@section('content')
@if(Session::has('flash_message'))
<script type="text/javascript">
    Swal.fire("Berhasil!","{{ Session('flash_message') }}", "success");
</script>
@endif
<div class="row">
    <div class="col-md-12">
        <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Jadwal Mata Pelajaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.jadwal_pelajaran.store') }}" method="POST">
                        @csrf @method('POST')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jam_pelajaran_id">Jam Pelajaran</label>
                                        <select name="jam_pelajaran_id" id="jam_pelajaran_id" class="form-control" required>
                                            <option value="">-Silahkan Pilih-</option>
                                            @foreach ($jam_pelajaran as $item)
                                            <option value="{{ $item->id }}">{{ $item->hari }} | {{ $item->jam_mulai }} - {{ $item->jam_selesai }} | {{ $item->status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="guru_mata_pelajaran_id">Guru Mata Pelajaran</label>
                                        <select name="guru_mata_pelajaran_id" id="guru_mata_pelajaran_id" class="form-control">
                                            <option value="">-Silahkan Pilih-</option>
                                            @foreach ($guru_mata_pelajaran as $item)
                                            <option value="{{ $item->id }}">{{ $item->guru->inisial }} - {{ $item->guru->nama }} - {{ $item->mataPelajaran->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rombel_id">Rombel</label>
                                        <select name="rombel_id" id="rombel_id" class="form-control">
                                            <option value="">-Silahkan Pilih-</option>
                                            @foreach ($rombel as $item)
                                                <option value="{{ $item->id }}">{{ $item->kelas->nama }} - {{ $item->kelas->tingkat->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-12" style="text-align: right">
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

    <div class="col-md-12">
        <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cari Jadwal Mata Pelajaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.jadwal_pelajaran') }}" method="GET">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="q_rombel">Rombel</label>
                                        <select name="q_rombel" id="q_rombel" class="form-control" required>
                                            <option value="">-Silahkan Pilih-</option>
                                            @foreach ($rombel as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $q_rombel)
                                                    selected
                                                @endif>{{ $item->kelas->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-12" style="text-align: right">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <!-- Left col -->
    @include('apps.admin.jadwal-pelajaran.components.senin', ['jadwal_pelajaran_senin' => $jadwal_pelajaran_senin])
    @include('apps.admin.jadwal-pelajaran.components.selasa', ['jadwal_pelajaran_selasa' => $jadwal_pelajaran_selasa])
    @include('apps.admin.jadwal-pelajaran.components.rabu', ['jadwal_pelajaran_rabu' => $jadwal_pelajaran_rabu])
    @include('apps.admin.jadwal-pelajaran.components.kamis', ['jadwal_pelajaran_kamis' => $jadwal_pelajaran_kamis])
    @include('apps.admin.jadwal-pelajaran.components.jumat', ['jadwal_pelajaran_jumat' => $jadwal_pelajaran_jumat])
    @include('apps.admin.jadwal-pelajaran.components.sabtu', ['jadwal_pelajaran_sabtu' => $jadwal_pelajaran_sabtu])
    <!-- /.col -->
</div>
@endsection

@section('footer-scripts')
<script type="text/javascript">
  function deleteThis(e){
      e.preventDefault();
      Swal.fire({
      title: "<div style='font-size:20px'>Apakah anda yakin?</div>",
      html: "<div style='font-size:15px'>Data akan dihapus secara permanen!</div>",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Batal'
      })
      .then((res) => {
          if (res.isConfirmed) {
              e.target.submit();
              swal("Data telah dihapus!", {
              icon: "success",
              });
          }
      });

      return false;
  }
</script>

@endsection