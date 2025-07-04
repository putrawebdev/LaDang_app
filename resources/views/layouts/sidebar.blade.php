@php
    $menus = [
        'Super Admin' => [
                (object) [
                    'title' => 'Dashboard',
                    'path' => route('dashboard'),
                    'pathinfo' => 'aktif-dash',
                    'icon' => 'fas fa-home'
                ],
                (object) [
                    'title' => 'Data User',
                    'path' => route('superadmin.user'),
                    'pathinfo' => 'aktif-user',
                    'icon' => 'fas fa-user'
                ],
                (object) [
                    'title' => 'Data Kategori',
                    'path' => route('superadmin.kategori'),
                    'pathinfo' => 'aktif-user',
                    'icon' => 'fas fa-list'
                ],
                (object) [
                    'title' => 'Data Barang',
                    'path' => route('superadmin.barang'),
                    'pathinfo' => 'aktif-barang',
                    'icon' => 'fas fa-boxes'
                ]
            ],
        'Admin' => [
            (object) [
                'title' => 'Dashboard',
                'path' => route('dashboard'),
                'pathinfo' => 'aktif-dash',
                'icon' => 'fas fa-home'
                ],
            (object) [
                'title' => 'Data Barang',
                'path' => route('superadmin.barang'),
                'pathinfo' => 'aktif-barang',
                'icon' => 'fas fa-boxes'
            ]
        ],
];
@endphp

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
            @foreach ($menus[auth()->user()->role] as $menu)
                <li class="nav-item">
                    <a wire:navigate href="{{ $menu->path }}" class="nav-link @yield($menu->pathinfo)">
                    <i class="nav-icon {{ $menu->icon }}"></i>
                    <p>
                        {{ $menu->title }}
                    </p>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>