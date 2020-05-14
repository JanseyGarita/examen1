<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exámen 1</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Materialize Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/login-styles.css">
</head>

<body style="overflow: hidden">

    @php
    get_preloader();
    @endphp

    <div class="container-fluid login-section">

        <div class="row login-row" style="z-index: 2; background: #fff;">
            <div class="col-s12">
                <div class="row tabs-row flex-center" style="width: 100%;">
                    <div class="col s12 m6">
                        <ul class="tabs flex-center">
                            <li class="tab col s3 l4"><a class="active" href="#log-in">Iniciar sesión</a></li>
                            <li class="tab col s3 l4"><a href="#sign-up">Registrarse</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row forms-container flex-center">
                    <div id="log-in" class="col s12">
                        <form class="container flex-center"
                            style="position: relative; width: 100%; flex-direction: column;" method="POST"
                            action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <?php
                        if(isset($message)){
                            ?>
                            <span class="red-text">
                                Datos erróneos
                            </span>
                            <?php
                        }
                    ?>
                            <div class="row" style="width: 80%;">

                                <div class="input-field col s12">
                                    <input id="email" type="email" name="user_mail" class="validate" required>
                                    <label for="email">Correo</label>
                                </div>
                            </div>
                            <div class="row" style="width: 80%;">
                                <div class="input-field col s12">
                                    <input id="password" type="password" name="user_password" class="validate" required>
                                    <label for="password">Contraseña</label>
                                </div>
                            </div>
                            <div class="row">
                                <button class="waves-effect waves-light btn">
                                    Ingresar
                                </button>
                            </div>
                        </form>

                    </div>
                    <div id="sign-up" class="col s12">
                        <div class="row">
                            <form class="col s12 flex-center" style="flex-direction: column;"
                                action="{{ route('insert_profile') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="user_name" type="text" class="validate" name="user_name">
                                        <label for="user_name">Nombre</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="user_phone" type="text" name="phone" class="validate">
                                        <label for="user_phone">Teléfono</label>
                                    </div>
                                </div>

                                <div class="row" style="width: 100%;">
                                    <div class="input-field col s12">
                                        <input id="email2" type="email" name="mail" class="validate">
                                        <label for="email2">Correo</label>
                                    </div>
                                </div>

                                <div class="row" style="width: 100%;">
                                    <div class="input-field col s12">
                                        <input id="password2" type="password" name="user_password" class="validate">
                                        <label for="password2">Contraseña</label>
                                    </div>
                                </div>
                                <button class="waves-effect waves-light btn">
                                    Registrarse
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <svg viewBox="0 0 1440 320">
            <path fill="#26a69a" fill-opacity="1"
                d="M0,32L48,74.7C96,117,192,203,288,229.3C384,256,480,224,576,186.7C672,149,768,107,864,106.7C960,107,1056,149,1152,165.3C1248,181,1344,171,1392,165.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>

    <!-- Scripts -->

    <!-- JQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/b94e20be92.js"></script>
    <!-- Materialize CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Personalized CDN -->
    <script>
        $(document).ready(function(){
            $('.tabs').tabs();
            $('.loading-container').fadeOut(400);
            $('body').fadeIn(500);
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