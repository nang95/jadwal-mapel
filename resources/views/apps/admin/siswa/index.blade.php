@extends('layouts.app')

@section('title-page')
    Siswa
@endsection

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
    <li class="breadcrumb-item active">Siswa</li>
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
    <div class="col-md-12">
    <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Siswa</h3>

                <div class="card-tools">
                    <a href="{{ route('admin.siswa.create') }}">
                        <button type="button" class="btn btn-sm btn-success">
                            Tambah
                        </button>
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <form action="{{ route('admin.siswa') }}">
                        <div class="form-group">
                            <input type="text" name="q_nama" value="{{ $q_nama }}" class="form-control form-control-sm" style="width: 200px" placeholder="Cari">
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table table-sm align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">NISN</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">No HP</th>
                          <th scope="col">Agama</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (count($siswa) === 0)
                        <tr>
                            <td colspan="8" style="text-align:center">
                                @if ($q_nama == "")
                                    <span>Data Kosong</span>
                                @else
                                    <span>Kriteria yang anda cari tidak sesuai</span>
                                @endif
                            </td>
                        </tr>
                        @endif
            
                        @foreach ($siswa as $data_siswa)
                        <tr>
                            <td>{{ $loop->iteration + $skipped }}</td>
                            <td>{{ $data_siswa->nisn }}</td>
                            <td>{{ $data_siswa->nama }}</td>
                            <td>{{ $data_siswa->alamat }}</td>
                            <td>{{ $data_siswa->no_hp }}</td>
                            <td>{{ $data_siswa->agama }}</td>
                            <td>
                                <a href="{{ route('admin.siswa.edit', $data_siswa->id) }}">
                                    <button class="btn btn-warning btn-sm">Ubah</button>
                                </a>
                                <form onsubmit="deleteThis(event)" action="{{ route('admin.siswa.delete') }}" method="POST" style="display:inline-block">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <input type="hidden" name="id" value="{{ $data_siswa->id }}">
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $siswa->appends(['q_nama' => $q_nama])->links() }}
            </div>
            <!-- /.card-body -->
        </div>
    </div>
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