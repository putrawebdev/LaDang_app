<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    @auth
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">

                <p>
                    {{ auth()->user()->name }}
                    @if (auth()->user()->role == 'super admin')
                        <div class="badge badge-success">
                        <small>{{ auth()->user()->role }}</small>
                        </div>
                    @else
                        <div class="badge badge-info">
                        <small>{{ auth()->user()->role }}</small>
                        </div>
                    @endif
                </p>
                </li>
                <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                <a href="#" class="btn btn-sm btn-danger btn-flat float-right" data-toggle="modal" data-target="#logoutModal">Log out</a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" role="button">
                <i class="fas fa-th-large"></i>
            </a>
            </li>
        </ul>
    @endauth
</nav>