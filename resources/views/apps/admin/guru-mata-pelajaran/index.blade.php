@extends('layouts.app')

@section('title-page')
    Guru Mata Pelajaran
@endsection

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.mata_pelajaran') }}">Mata Pelajaran</a></li>
    <li class="breadcrumb-item active">Guru Mata Pelajaran</li>
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
    <div class="col-md-8">
    <!-- MAP & BOX PANE -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Guru Mata Pelajaran</h3>

                <div class="card-tools">
                    <a href="{{ route('admin.mata_pelajaran.guru_mapel.create', $mata_pelajaran->id) }}" class="btn btn-sm btn-success">Tambah</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <form action="{{ route('admin.mata_pelajaran.guru_mapel', $mata_pelajaran->id) }}">
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
                          <th scope="col">Guru</th>
                          <th scope="col">Kelas</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (count($guru_mata_pelajaran) === 0)
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
            
                        @foreach ($guru_mata_pelajaran as $data_guru_mata_pelajaran)
                        <tr>
                            <td>{{ $loop->iteration + $skipped }}</td>
                            <td>{{ $data_guru_mata_pelajaran->guru->nama }}</td>
                            <td>{{ $data_guru_mata_pelajaran->kelas->nama }} - {{ $data_guru_mata_pelajaran->kelas->tingkat->nama }}</td>
                            <td>
                                <a href="{{ route('admin.mata_pelajaran.guru_mapel.edit', [$data_guru_mata_pelajaran->id, $mata_pelajaran->id]) }}">
                                    <button class="btn btn-warning btn-sm">Ubah</button>
                                </a>
                                <form onsubmit="deleteThis(event)" action="{{ route('admin.mata_pelajaran.guru_mapel.delete') }}" method="POST" style="display:inline-block">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <input type="hidden" name="mata_pelajaran_id" value="{{ $mata_pelajaran->id }}">
                                    <input type="hidden" name="id" value="{{ $data_guru_mata_pelajaran->id }}">
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
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