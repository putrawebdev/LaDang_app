<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>LaDang | Kelola Gudang</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    @include('layouts.asset-lp.style')
    @include('layouts.style')
    </head>

    <body class="index-page">

    @include('layouts.asset-lp.header')

    <main class="main">
        {{ $slot }}
    </main>

    @include('layouts.asset-lp.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    @include('layouts.asset-lp.script')

    </body>
</html>