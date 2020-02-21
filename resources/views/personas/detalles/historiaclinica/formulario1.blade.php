@if(isset($editar))
    <div id="editar{{$clase}}">
        <div class="card card-body">        
            <form method="POST" id="formeditar{{$clase}}" onsubmit="agregaritem('editarmedicamento', '#formeditarmedicamento', 
            {{ route('historiaclinica.clase.actualizar', array($persona->id, 'medicamento', 'tabla1') )}}', '#tablamedicamento')">
                @csrf
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" name="descripcion"  value="{{ $editar->descripcion }}">
                    <input type="hidden" name="id" id="id" value="{{ $editar->id }}">
                </div>                
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
@else
    <p>
        <a class="btn btn-success" data-toggle="collapse" href="#nueva{{ $clase}}" role="button" aria-expanded="false" aria-controls="collapseclase">
            Agregar
        </a>
    </p>
            
    <div class="collapse" id="nueva{{$clase}}">
        <div class="card card-body">        
            <form method="POST" id="formnueva{{$clase}}">
                @csrf
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion">
                </div>                
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
@endisset


