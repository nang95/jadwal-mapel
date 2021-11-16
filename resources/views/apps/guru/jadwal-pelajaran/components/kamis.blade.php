<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Kami</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table table-sm align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Guru</th>
                      <th scope="col">Les Ke</th>
                      <th scope="col">Mapel</th>
                      <th scope="col">Jam</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($jadwal_pelajaran_kamis as $data_jadwal_pelajaran)
                    <tr>
                      <td>
                        @if ($data_jadwal_pelajaran->jamPelajaran->status == "Belajar")
                          {{ $data_jadwal_pelajaran->guruMataPelajaran->guru->inisial }}
                        @else
                          -
                        @endif
                      </td>
                      <td>
                        @if ($data_jadwal_pelajaran->jamPelajaran->status == "Belajar")
                          {{ $data_jadwal_pelajaran->jamPelajaran->les_ke }}
                        @else
                          -
                        @endif
                      </td>
                      <td>
                        @if ($data_jadwal_pelajaran->jamPelajaran->status == "Belajar")
                          {{ $data_jadwal_pelajaran->guruMataPelajaran->mataPelajaran->nama }}
                        @else
                          {{ $data_jadwal_pelajaran->jamPelajaran->status }}
                        @endif
                      </td>
                      <td>{{ $data_jadwal_pelajaran->jamPelajaran->jam_mulai }} - {{ $data_jadwal_pelajaran->jamPelajaran->jam_selesai }}</td>
                        <td>
                            <form onsubmit="deleteThis(event)" action="{{ route('admin.jadwal_pelajaran.delete') }}" method="POST" style="display:inline-block">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <input type="hidden" name="id" value="{{ $data_jadwal_pelajaran->id }}">
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