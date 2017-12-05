<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NUEVO SISTEMA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

        <!-- Styles -->
        <style>

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/menu') }}">Menu</a>
                    @else
                        <a href="{{ url('/login') }}">Iniciar sesion</a>
                      
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    MODULO DE VACACIONES
                </div>


            </div>
        </div>
    </body>
    <script type="text/javascript" src="js/nieve.js"></script>
</html>
