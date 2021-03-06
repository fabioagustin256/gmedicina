@isset($correcto)
	@include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])
@endisset

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">DNI</th>
            <th scope="col">Apellido</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fec. nacimiento</th>
            @isset(Auth::user()->role)
                @if( Auth::user()->role->name  == "admin" )
                    @isset($opciones) 
                        <th scope="col">Opciones</th>
                    @endisset
                @endif
            @endisset
        </tr>
    </thead>
    <tbody>   
        @if(count($personas))
            @foreach ($personas as $persona)
                <tr>
                    @include('personas.listado.campostabla', ['personas'=>$personas])
                    @isset(Auth::user()->role)
                        @if( Auth::user()->role->name  == "admin" )
                            @isset($opciones)                        
                                <td class="text-center">
                                    @if(isset($eliminados))
                                        <a class="btn btn-success btn-sm" href="{{ route('personas.recuperar_eliminado', $persona->id) }}" role="button">Recuperar</a>
                                    @else 
                                        <a class="btn btn-warning btn-sm" href="{{ route('personas.edit', $persona) }}" role="button">Editar</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('personas.show', $persona) }}" role="button">Historia Clínica</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar" data-nombre="{{ $persona->nombre }}" data-apellido="{{ $persona->apellido }}" data-personaid="{{ $persona->id }}">Eliminar</button>
                                    @endif
                                </td>
                            @endisset
                        @endisset
                    @endif
                </tr>
            @endforeach
        @else
            <tr class="text-center">
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                @isset($opciones) 
                    <td>-</td>
                @endisset
            </tr> 
        @endif
    </tbody>
</table>

@isset($personas)
    {{ $personas->links() }}    
@endisset