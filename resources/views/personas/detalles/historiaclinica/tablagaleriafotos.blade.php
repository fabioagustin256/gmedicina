@isset($correcto)
    @include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])
@endisset

<div class="row">
    @if($persona->galeria_fotos->count())                
        @foreach($persona->galeria_fotos as $foto)            
            <div class='col-sm-2'>            
                <a href="{{ url('archivos/fotos/'.$foto->persona_id.'/'. $foto->foto)}}">            
                    <img class="img-thumbnail" style="max-height: 200px; min-width: 200px;" src="{{ url('archivos/fotos/'.$foto->persona_id.'/'.$foto->foto)}}" />            
                    <input type="hidden" name="_method" value="delete">
                    <div class='text-center'>            
                        <small class='text-muted'>{{ $foto->titulo }}</small>            
                    </div>                                         
                </a>
                <button type="button" class="btn btn-sm btn-danger icono-eliminar" aria-label="Close" onclick="quitaritem('{{ route('galeriafotos.eliminar',  array($persona, $foto->id)) }}', '#tablagaleriafoto')">
                    <strong>X</strong>
                </button>
            </div>
        @endforeach            
    @endif 
</div>