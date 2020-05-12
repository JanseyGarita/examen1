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

    <link rel="stylesheet" href="styles/main.css">
    @yield('links')
</head>

<body>

    @php
    get_preloader();
    @endphp

    <!--   Navbar     -->


    <nav class="fixed-top">
        <div class="nav-wrapper">
            <a href="" class="brand-logo ml-2">UCR</a>
            <ul class="right hide-on-med-and-down mr-2">
                <abbr title="Buscar">
                    <li class="{{ $profiles }}">
                        <a href="/profiles"><i class="material-icons">search</i></a>
                    </li>
                </abbr>
                <abbr title="Perfil">
                    <li class="{{ $profile }}">
                        <a href="/"><i class="material-icons">person</i></a>
                    </li>
                </abbr>
                <abbr title="Mis videos">
                    <li class="{{ $videos }}">
                        <a href="/watch"><i class="material-icons">play_arrow</i></a>
                    </li>
                </abbr>
                <abbr title="Salir">
                    <li><a href="mobile.html"><i class="material-icons">exit_to_app</i></a></li>
                </abbr>
            </ul>
        </div>
    </nav>

    <div class="container-fluid p-2">
        @yield('content')
    </div>

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
            $('.loading-container').fadeOut(300);
            $('body').fadeIn(200);

            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {format:"dd-mm-yyyy"});
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