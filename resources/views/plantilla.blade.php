<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ url ('bootstrap/css/bootstrap.css') }}">        
        <link rel="stylesheet" href="{{ url ('css/fieldset.css') }}">
        <link rel="stylesheet" href="{{ url ('css/submenu.css') }}">
        <link rel="stylesheet" href="{{ url ('jquery/css/jquery-ui.css') }}">

        @yield('css')
        
        <title>GMedicina</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('inicio') }}"> GMedicina </a>
                    </li>                   

                    {{-- Si el usuario es administración se muestran las siguientes opciones --}}
                    
                    @isset(Auth::user()->role)
                        @if( Auth::user()->role->name  == "admin" )
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Administración
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#"> Campos de formularios </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('administracion.clase.listar', array('clase'=>'estadocivil', 'plural'=>'estados civiles')) }}"> Estado Civil </a></li>
                                            <li><a class="dropdown-item" href="{{ route('administracion.clase.listar', array('clase'=>'obrasocial', 'plural'=>'obras sociales')) }}"> Obra Social </a></li>
                                            <li><a class="dropdown-item" href="{{ route('administracion.clase.listar', array('clase'=>'ocupacion', 'plural'=>'ocupaciones')) }}"> Ocupación </a></li>        				            
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#"> Eliminados </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('personas.listar_eliminados') }}"> Persona </a></li>            
                                        </ul>
                                    </li>  
                                </ul>
                            </li>
                        @endif
                    @endisset
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">                       
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>                            
                        </div>
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