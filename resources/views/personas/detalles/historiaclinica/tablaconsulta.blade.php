@isset($correcto)
    @include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])
@endisset

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">Fecha</th>
            <th scope="col">Motivo</th>
            <th scope="col">Tratamiento</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @if(count($objetos))
            @foreach ($objetos as $objeto)
                <tr class="text-center">
                    <td> {{ $objeto->mostrar_fecha() }} </td>
                    <td> {{ $objeto->motivo }} </td>
                    <td> {{ $objeto->tratamiento }} </td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editar{{$clase}}" data-fec="{{ $objeto->mostrar_fecha() }}" data-mmotivo="{{ $objeto->motivo }}" data-ttratamiento="{{ $objeto->tratamiento }}" data-idclase="{{ $objeto->id }}">
                            Editar
                        </button>                                        
                        <button type="button" class="btn btn-danger btn-sm" onclick="quitaritem('{{ route('historiaclinica.clase.quitar',  array($personaid, $clase, $objeto->id, 'tablaconsulta')) }}', '#tabla{{$clase}}')">
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