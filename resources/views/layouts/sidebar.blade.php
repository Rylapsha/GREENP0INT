<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #6e9773ff;" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('welcome')}}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-leaf"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GREEN P0INT</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $menuDashboard ?? '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-industry"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (auth()->user()->hak_akses=='Admin')
    <!-- Heading -->
    <div class="sidebar-heading">
        MENU - ADMIN
    </div>
    <!-- Nav Item -->
    <li class="nav-item {{ $menuAdminUser ?? '' }}">
        <a class="nav-link" href="{{route('user')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Pengguna</span></a>
    </li>
    <li class="nav-item {{ $menuAdminKelola ?? '' }}">
        <a class="nav-link" href="{{route(name: 'kelola')}}">
            <i class="fas fa-fw fa-tasks"></i>
            <span>Kelola Sampah</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    @else
    <!-- Heading -->
    <div class="sidebar-heading">
        MENU - PENGGUNA
    </div>

    <!-- Nav Item -->
    <li class="nav-item {{ $menuPenggunaKelola ?? '' }}">
        <a class="nav-link" href="{{route('kelola')}}">
            <i class="fas fa-fw fa-recycle"></i>
            <span>Setor Sampah</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    @endif


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->