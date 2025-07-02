<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
    <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Kelola Gudang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <li class="nav-header">MENU SUPERADMIN</li>
            <li class="nav-item">
                <a wire:navigate href="{{ route('superadmin.user') }}" class="nav-link @yield('aktif-user')">
                <i class="nav-icon fas fa-user mr-1"></i>
                <p>
                    User
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a wire:navigate href="{{ route('superadmin.kategori') }}" class="nav-link @yield('aktif-kategori')">
                <i class="nav-icon fas fa-list mr-1"></i>
                <p>
                    Kategori
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a wire:navigate href="{{ route('superadmin.barang') }}" class="nav-link @yield('aktif-barang')">
                <i class="nav-icon fas fa-boxes mr-1"></i>
                <p>
                    Barang
                </p>
                </a>
            </li>
            <li class="nav-header">MENU ADMIN</li>
            <li class="nav-item">
                <a wire:navigate href="#" class="nav-link">
                <i class="nav-icon fas fa-boxes mr-1"></i>
                <p>
                    Barang
                </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>