<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exámen 1</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Materialize Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="/styles/main.css">
    @yield('links')
</head>

<body style="position: relative;">

    @php
    get_preloader();
    @endphp

    <!--   Navbar     -->
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">UCR</a>
                <a href="#" data-target="side-bar" class="sidenav-trigger">
                    <i class="material-icons text-white">menu</i>
                </a>
                <ul class="right hide-on-med-and-down mr-2">
                    <abbr title="Perfil">
                        <li class="nav-link {{ $profile }}">
                            <a href="/"><i class="material-icons">person</i></a>
                        </li>
                    </abbr>
                    <abbr title="Mis videos">
                        <li class="nav-link {{ $videos }}">
                            <a href="/watch"><i class="material-icons">play_arrow</i></a>
                        </li>
                    </abbr>
                    <abbr title="Comunidad">
                        <li class="nav-link {{ $profiles }}">
                            <a href="/community"><i class="material-icons">people</i></a>
                        </li>
                    </abbr>
                    <abbr title="Salir">
                        <li><a href="/exit"><i class="material-icons">exit_to_app</i></a></li>
                    </abbr>
                </ul>
            </div>
        </nav>
    </div>

    <ul class="sidenav" id="side-bar" style="height: 100%;">
        <li class="{{ $profile }} mt-4">
            <a href="/"><i class="material-icons">person</i> Mi perfil</a>
        </li>
        <li class="{{ $videos }}">
            <a href="/watch"><i class="material-icons">play_arrow</i> Mis videos</a>
        </li>
        <li class="{{ $profiles }}">
            <a href="/community"><i class="material-icons">people</i> Comunidad</a>
        </li>
        <li style="position: absolute; bottom: 20px !important;">
            <a href="/exit"><i class="material-icons">exit_to_app</i> Salir</a>
        </li>
    </ul>

    <!--  Content  -->

    @yield('content')

    @php
    get_footer();
    @endphp

    <!-- Scripts -->

    <!-- JQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/b94e20be92.js"></script>
    <!-- Materialize CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Personalized CDN -->
    @yield('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.loading-container').fadeOut(400);
            $('body').fadeIn(500);

            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>

</body>

</html>


<!--   Preloader     -->

@php
function get_preloader(){
@endphp

<div class="loading-container full-height flex-center full-width"
    style="position: fixed; z-index: 1000; background-color: #fff;">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>

        <div class="spinner-layer spinner-red">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>

        <div class="spinner-layer spinner-yellow">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>

        <div class="spinner-layer spinner-green">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>

@php
}
@endphp


<!--  Footer  -->

@php
function get_footer(){
@endphp
<footer class="container-fluid p-2"
    style="background: #263238; text-align: center; width: 100%; position: relative; bottom: 0;">
    <p class="text-uppercase text-light" style="color: #ccc;">
        Reservados todos los derechos
        <script>
            document.write(new Date().getFullYear());
        </script>
    </p>
    <p class="text-uppercase" style="color: #ddd;">
        Desarrollado por: Jansey Garita y Armando Madriz
    </p>
</footer>
@php
}
@endphp