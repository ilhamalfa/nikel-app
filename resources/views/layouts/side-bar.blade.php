<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Nikel App</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->is('peminjaman*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Peminjaman</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Peminjaman :</h6>
                @if (auth()->user()->is_admin == true)
                    <a class="collapse-item" href="{{ url('peminjaman') }}">Form Peminjaman</a>
                    <a class="collapse-item" href="{{ url('pengembalian') }}">Form Pengembalian</a>
                    <a class="collapse-item" href="{{ url('export/laporan') }}">Laporan</a>
                @else
                    <a class="collapse-item" href="{{ url('persetujuan') }}">Form Persetujuan</a>
                @endif
                    <a class="collapse-item" href="{{ url('riwayat/user') }}">Riwayat</a>
            </div>
        </div>
    </li>

    @if (auth()->user()->is_admin == true)
    <li class="nav-item {{ request()->is('kendaraan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('kendaraan') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Kendaraan</span></a>
    </li>

    <li class="nav-item {{ request()->is('user*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('user') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>User</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>