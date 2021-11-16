@extends('layouts.app')

@section('title-page')
    Jadwal Pelajaran
@endsection

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('guru./') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('guru.jadwal_pelajaran') }}">Jadwal Pelajaran</a></li>
    <li class="breadcrumb-item active">Jadwal Pelajaran</li>
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
                <h3 class="card-title">Cari Jadwal Mata Pelajaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('guru.jadwal_pelajaran') }}" method="GET">
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