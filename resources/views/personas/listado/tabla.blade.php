<table class="table table-bordered table-sm">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">DNI</th>
            <th scope="col">Apellido</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fec. nacimiento</th>
            @isset($opciones) 
                <th scope="col">Opciones</th>
            @endisset
        </tr>
    </thead>
    <tbody>   
        @if(count($personas))
            @foreach ($personas as $persona)
                <tr>
                    @include('personas.listado.campostabla', ['personas'=>$personas])
                    @isset($opciones)                        
                        <td class="text-center">

                        </td>
                    @endisset
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