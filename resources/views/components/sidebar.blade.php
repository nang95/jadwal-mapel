<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light">Sistem Mapel</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
    @switch(auth()->user()->roles()->pluck('name')->first())
      @case('admin')
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('admin.jabatan') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jabatan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.siswa') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Siswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.guru') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Guru</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-school"></i>
                <p>
                  Sekolah
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('admin.tingkat') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tingkat</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.kelas') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kelas</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.rombel') }}" class="nav-link">
                <i class="fas fa-chalkboard nav-icon"></i>
                <p>Rombel</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-clock"></i>
                <p>
                  Pelajaran
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('admin.mata_pelajaran') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mata Pelajaran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.jam_pelajaran') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jam Pelajaran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.jadwal_pelajaran') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jadwal Pelajaran</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        
        @break
        @case('guru')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('guru.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('guru.jadwal_pelajaran') }}" class="nav-link">
              <i class="fas fa-chalkboard nav-icon"></i>
              <p>Jadwal Pelajaran</p>
            </a>
          </li>
        </ul>
      
        @break
    @default
        
@endswitch

</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>