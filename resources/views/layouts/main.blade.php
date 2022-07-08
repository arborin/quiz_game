<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="quiz app" />
        <meta name="author" content="n.kobaidze" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/alertify.css')}}" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
        <link href="{{ asset('css/custom.css')}}" rel="stylesheet" />

        <!-- Bootstrap core JS-->
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> --}}
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
       @include('layouts._navbar')
        <!-- Page content-->
        <div class="container">
            @yield('content')
        </div>
        <!-- Bootstrap core JS-->


        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/alertify.min.js') }}"></script>

        @yield('script')


        @if(Session::has('success'))
            <script>
                const msg = '{{ Session::get('success') }}';
                // console.log(msg)
                alertify.success(msg);
            </script>
        @endif

        @if(Session::has('error'))
            <script>
                const msg = '{{ Session::get('error') }}';
                alertify.error(msg);
            </script>
        @endif

    </body>
</html>
