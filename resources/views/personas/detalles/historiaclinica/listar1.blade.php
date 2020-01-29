<span id="tabla{{$clase}}">
    @include('personas.detalles.historiaclinica.tabla1', 
        ['clase' => $clase, 'personaid'=> $personaid, 'objetos' => $objetos])
</span>

<p>
    <a class="btn btn-success" data-toggle="collapse" href="#nuevo{{ $clase}}" role="button" aria-expanded="false" aria-controls="collapseclase">
        Agregar
    </a>
</p>
        
<div class="collapse" id="nuevo{{$clase}}">
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