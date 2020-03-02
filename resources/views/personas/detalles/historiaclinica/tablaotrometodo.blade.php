@isset($correcto)
    @include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])
@endisset

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">Fecha</th>
            <th scope="col">Tipo</th>
            <th scope="col">Descripción</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @if(count($objetos))
            @foreach ($objetos as $objeto)
                <tr class="text-center">
                    <td> {{ $objeto->mostrar_fecha() }} </td>
                    <td> {{ $objeto->tipo }} </td>
                    <td> {{ $objeto->descripcion }} </td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editar{{$clase}}" data-fec="{{ $objeto->mostrar_fecha() }}" data-ttipo="{{ $objeto->tipo }}" data-desc="{{ $objeto->descripcion }}" data-idclase="{{ $objeto->id }}">
                            Editar
                        </button>                                         
                        <button type="button" class="btn btn-danger btn-sm" onclick="quitaritem('{{ route('historiaclinica.clase.quitar',  array($personaid, $clase, $objeto->id, 'tablaotrometodo')) }}', '#tabla{{$clase}}')">
                            Quitar
                        </button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="text-center">
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr> 
        @endif
    </tbody>
</table>