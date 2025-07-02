<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaDang | @yield('title')</title>
    {{-- web style --}}
    @include('layouts.style')
  </head>
  <body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
        @include('layouts.navbar')
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
        @include('layouts.sidebar')

      <!-- Content Wrapper. Contains page content -->
        @yield('content')
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Make With</b> 💗
        </div>
        <strong>Copyright &copy; 2025 <a href="#">PutraWebDev</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    
    {{-- web script --}}
    @include('layouts.script')
  </body>
</html>
