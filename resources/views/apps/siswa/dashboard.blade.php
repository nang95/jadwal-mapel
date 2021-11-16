@extends('layouts.app')

@section('title-page')
    Jadwal Pelajaran
@endsection

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('siswa./') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('siswa.jadwal_pelajaran') }}">Jadwal Pelajaran</a></li>
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
    <!-- Left col -->
    @include('apps.siswa.components.senin', ['jadwal_pelajaran_senin' => $jadwal_pelajaran_senin])
    @include('apps.siswa.components.selasa', ['jadwal_pelajaran_selasa' => $jadwal_pelajaran_selasa])
    @include('apps.siswa.components.rabu', ['jadwal_pelajaran_rabu' => $jadwal_pelajaran_rabu])
    @include('apps.siswa.components.kamis', ['jadwal_pelajaran_kamis' => $jadwal_pelajaran_kamis])
    @include('apps.siswa.components.jumat', ['jadwal_pelajaran_jumat' => $jadwal_pelajaran_jumat])
    @include('apps.siswa.components.sabtu', ['jadwal_pelajaran_sabtu' => $jadwal_pelajaran_sabtu])
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