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
    <link rel="shortcut icon" href="{{asset('assets/img/icons/icon-48x48.png')}}"/>

    <title>Peixe simples - @yield('title')</title>

    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app2.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    @include('layouts.menu.sidebar')
    <div class="main">
        @include('layouts.menu.main')
        <main class="content">
            @yield('content')
        </main>
    </div>

</div>


</body>

<script src="{{asset('assets/js/app.js')}}"></script>
</html>
