<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kelola Gudang | Log in</title>
        @include('layouts.style')
        <link rel="stylesheet" href="{{ asset('daka-asset/css/daka.css') }}">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="logo-login-div">
                <h2 class="logo-login text-dark">Kelola Gudang</h2>
            </div>
            <!-- /.login-logo -->
            <div class="card ">
                {{ $slot }}
            </div>
        </div>
        <!-- /.login-box -->
        

        @if (session('errormiddleware'))
                <script>
                    Swal.fire({
                        title: "Something wrong!",
                        text: "{{ session('errormiddleware') }}",
                        icon: "error"
                    });
                </script>
        @endif

        {{-- script section --}}
        @include('layouts.script')
    </body>
</html>