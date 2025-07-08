<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="#" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">LaDang</h1>
    </a>

    <nav id="navmenu" class="navmenu">
        <ul>
        <li><a href="#hero" class="active">Home</a></li>
        <li><a href="#contact">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
    @if (Auth::check())
        <a href="{{ route('dashboard') }}" class="cta-btn">Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="cta-btn">Login</a>
    @endif

    </div>
</header>