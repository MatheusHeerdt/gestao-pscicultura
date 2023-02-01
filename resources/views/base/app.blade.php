<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="Ferramenta de gestao para psicultura"/>
    <meta name="author" content="Matheus Heerdt"/>
    <meta name="keywords" content="psicultura, gestao, agro, agro-negocios, agricultura">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    {{--    <link rel="shortcut icon" href="{{asset('assets/img/icons/icon-48x48.png')}}"/>--}}

    <title>@yield('title')</title>

    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/demo.rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/tabler.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/tabler.rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/tabler-flags.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/tabler-flags.rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/tabler-payments.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/tabler-payments.rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/tabler-vendors.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/tabler-vendors.rtl.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper ">
    @include('layouts.menu.sidebar')
    <div class="main page-wrapper">
        @include('layouts.menu.main')

        <main class="content ">
            <div class="container page-wrapper">
            @yield('content')
            @include('layouts.footer')
            </div>
        </main>
    </div>

</div>

</body>

<script src="{{asset('assets/js/tabler.min.js')}}"></script>
<script src="{{asset('assets/js/demo.min.js')}}"></script>
</html>
<style>
    .navbar-expand-lg.navbar-vertical ~ .navbar, .navbar-expand-lg.navbar-vertical ~ .page-wrapper{
        margin-right: 0 !important;
    }
</style>
