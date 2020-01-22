<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ url ('bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url ('jquery/css/jquery-ui.css') }}">

        <title>GMedicina</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> GMedicina </a>
                    </li>                       
                </ul>
            </div>
        </nav>
        <br/>
        <div class="container-fluid">
            @yield('contenido')
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ url('jquery/js/jquery-3.3.1.js') }}"></script>
        <script src="{{ url('jquery/js/jquery-ui.js') }}" ></script>
        <script src="{{ url('bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ url('bootstrap/js/popper.js') }}"></script>
        @yield("script")

    </body> 
</html>