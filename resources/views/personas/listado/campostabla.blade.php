<td  class="text-center">{{ number_format($persona->dni, 0, ',', '.') }}</td>
<td>{{ $persona->apellido }}</td>
<td>{{ $persona->nombre }}</td>
<td class="text-center">
    @if ($persona->fecha_nacimiento)
        {{ date('d/m/Y', strtotime($persona->fecha_nacimiento)) }}
    @else 
        -
    @endif
</td>