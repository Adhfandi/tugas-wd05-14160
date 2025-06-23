<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Poliklinik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(auth()->user()->role === 'dokter')
                <li class="nav-item">
                    <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dokter.jadwal-periksa.index') }}" class="nav-link {{ request()->routeIs('dokter.jadwal-periksa.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Jadwal Periksa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dokter.memeriksa') }}" class="nav-link {{ request()->routeIs('dokter.memeriksa') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-stethoscope"></i>
                        <p>Periksa Pasien</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dokter.riwayat-pasien') }}" class="nav-link {{ request()->routeIs('dokter.riwayat-pasien') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>Riwayat Pasien</p>
                    </a>
                </li>
                @elseif (Auth::user()->role == 'pasien')
                <li class="nav-item">
                    <a href="{{ route('pasien.dashboard') }}" class="nav-link {{ request()->routeIs('pasien.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pasien.periksa') }}" class="nav-link {{ request()->routeIs('pasien.periksa') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-plus"></i>
                        <p>Pendaftaran Periksa</p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dokter.index') }}" class="nav-link {{ request()->routeIs('admin.dokter.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>Kelola Dokter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pasien.index') }}" class="nav-link {{ request()->routeIs('admin.pasien.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Kelola Pasien</p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link bg-danger">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside> 