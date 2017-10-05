<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'WebUpload') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/site.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @if (!Request::is('/'))
                <a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                @endif
                @auth
                <a href="{{ url('/painel') }}"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> Sair
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @else
                <a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</a>
                @if(PrefSistema::auto_registro())
                <a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrar-se</a>
                @endif
                @endauth
            </div>
            @endif

            <div class="content">
                @yield('conteudo')

                <div class="links">
                    @if (!Request::is('/'))
                    <a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a> &diams; 
                    @endif
                    <a href="{{ url('sobre') }}">Sobre</a> &diams; 
                    <a href="{{ url('politica') }}">Política de uso</a> &diams; 
                    <a href="{{ url('github') }}">Github</a>
                </div>
            </div>
        </div>

        @stack('scripts')
    </body>
</html>