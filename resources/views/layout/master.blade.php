<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title> IMST | {{$title}} </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
        @include('layout.head-css')
    </head>

    <body>
        @include('layout.sidebar')

        <div class="page-wrapper">
            @include('layout.topbar')

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                @include('layout.footer')
            </div>

        </div>
        @include('layout.vendor-scripts')
    </body>
</html>