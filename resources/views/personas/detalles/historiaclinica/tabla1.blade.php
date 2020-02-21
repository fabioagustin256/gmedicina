@isset($correcto)
    @include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])
@endisset

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">Descripción</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @if(count($objetos))
            @foreach ($objetos as $objeto)           
                <tr class="text-center">
                    <td> {{ $objeto->descripcion }} </td>
                    <td>      
                        <button type="button" class="btn btn-warning btn-sm" onclick="editaritem('{{ route('historiaclinica.clase.editar',  array($personaid, $clase, $objeto->id, 'formulario1')) }}', '#formulario{{$clase}}edit')">
                            Editar
                        </button>                             
                        <button type="button" class="btn btn-danger btn-sm" onclick="quitaritem('{{ route('historiaclinica.clase.quitar',  array($personaid, $clase, $objeto->id, 'tabla1')) }}', '#tabla{{$clase}}')">
                            Quitar
                        </button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="text-center">
                <td>-</td>
                <td>-</td>
            </tr> 
        @endif
    </tbody>
</table>