@isset($correcto)
    @include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])
@endisset

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">Fecha</th>
            <th scope="col">Descripción</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @if(count($objetos))
            @foreach ($objetos as $objeto)
                <tr class="text-center">
                    <td> {{ date('d/m/Y', strtotime($objeto->fecha)) }} </td>
                    <td> {{ $objeto->descripcion }} </td>
                    <td>                                       
                        <button type="button" class="btn btn-danger btn-sm" onclick="quitaritem('{{ route('historiaclinica.clase.quitar',  array($personaid, $clase, $objeto->id, 'tablalaboratorio')) }}', '#tabla{{$clase}}')">
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