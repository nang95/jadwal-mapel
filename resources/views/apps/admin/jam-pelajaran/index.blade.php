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
                    <h3 class="card-title">Tambah Jam Pelajaran</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('admin.jam_pelajaran.store') }}" method="POST">
                            @csrf @method('POST')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="hari">Hari</label>
                                            <select name="hari" id="hari" class="form-control" required>
                                              <option value="">-Silahkan Pilih-</option>
                                              <option value="Senin">Senin</option>
                                              <option value="Selasa">Selasa</option>
                                              <option value="Rabu">Rabu</option>
                                              <option value="Kamis">Kamis</option>
                                              <option value="Jumat">Jumat</option>
                                              <option value="Sabtu">Sabtu</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="les_ke">Les Ke</label>
                                            <input type="number" id="les_ke" name="les_ke" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="jam_mulai">Jam Mulai</label>
                                            <input type="time" id="jam_mulai" name="jam_mulai" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="jam_selesai">Jam Selesai</label>
                                            <input type="time" id="jam_selesai" name="jam_selesai" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="">-Silahkan Pilih-</option>
                                                <option value="Istirahat">Istirahat</option>
                                                <option value="Belajar">Belajar</option>
                                                <option value="Upacara">Upacara</option>
                                                <option value="Kegiatan Lain">Kegiatan Lain</option>
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

    <!-- Left col -->
    @include('apps.admin.jam-pelajaran.components.senin', ['jam_pelajaran_senin' => $jam_pelajaran_senin])
    @include('apps.admin.jam-pelajaran.components.selasa', ['jam_pelajaran_selasa' => $jam_pelajaran_selasa])
    @include('apps.admin.jam-pelajaran.components.rabu', ['jam_pelajaran_rabu' => $jam_pelajaran_rabu])
    @include('apps.admin.jam-pelajaran.components.kamis', ['jam_pelajaran_kamis' => $jam_pelajaran_kamis])
    @include('apps.admin.jam-pelajaran.components.jumat', ['jam_pelajaran_jumat' => $jam_pelajaran_jumat])
    @include('apps.admin.jam-pelajaran.components.sabtu', ['jam_pelajaran_sabtu' => $jam_pelajaran_sabtu])
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