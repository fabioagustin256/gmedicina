@extends('plantilla')

@section('contenido')

    <h3>Listado de personas</h3>

    <br><br>

    <div class="text-sm-right">     
        <a class="btn btn-primary" href="{{ route('personas.create') }}" role="button">Agregar</a>
    </div>

    <br>

    <span id="tablapersonas">
        @include('personas.listado.tabla', ['personas' => $personas]) 
    </span>

@endsection

