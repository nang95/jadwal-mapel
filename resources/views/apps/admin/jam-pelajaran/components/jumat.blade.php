<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Jumat</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table table-sm align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Les Ke</th>
                      <th scope="col">Jam</th>
                      <th scope="col">Status</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($jam_pelajaran_jumat as $data_jam_pelajaran)
                    <tr>
                        <td>{{ $data_jam_pelajaran->les_ke }}</td>
                        <td>{{ $data_jam_pelajaran->jam_mulai }} - {{ $data_jam_pelajaran->jam_selesai }}</td>
                        <td>{{ $data_jam_pelajaran->status }}</td>
                        <td>
                            <form onsubmit="deleteThis(event)" action="{{ route('admin.jam_pelajaran.delete') }}" method="POST" style="display:inline-block">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <input type="hidden" name="id" value="{{ $data_jam_pelajaran->id }}">
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