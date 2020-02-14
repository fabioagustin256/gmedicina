@isset($correcto)
    @include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])
@endisset

<div class="row">
    <div class='list-group gallery'>   
        @if($persona->galeria_fotos->count())                
            @foreach($persona->galeria_fotos as $foto)            
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>            
                    <a class="thumbnail fancybox" rel="ligthbox" href="{{ url('archivos/fotos/'.$foto->persona_id.'/'. $foto->foto)}}">            
                        <img class="img-fluid" alt="" src="{{ url('archivos/fotos/'.$foto->persona_id.'/'.$foto->foto)}}" />            
                        <input type="hidden" name="_method" value="delete">
                        <div class='text-center'>            
                            <small class='text-muted'>{{ $foto->titulo }}</small>            
                        </div>                                         
                    </a>
                    <button type="submit" class="close-icon btn btn-danger" onclick="quitaritem('{{ route('galeriafotos.eliminar',  array($persona, $foto->id)) }}', '#tablagaleriafoto')">
                        <i class="glyphicon glyphicon-remove"></i>
                    </button>
                </div>
            @endforeach            
        @endif            
    </div>            
</div>