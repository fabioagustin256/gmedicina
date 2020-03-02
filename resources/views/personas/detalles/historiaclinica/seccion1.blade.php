<div class="card">
    <div class="card-header" role="tab" id="{{ $clase }}HeaderId">
        <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordianId" href="#{{ $clase }}ContentId" aria-expanded="true" aria-controls="{{ $clase }}ContentId">
                {{ $titulo }}
            </a>
        </h5>
    </div>
    <div id="{{ $clase }}ContentId" class="collapse" role="tabpanel" aria-labelledby="{{ $clase }}HeaderId">
        <div class="card-body">
            <div id="tabla{{ $clase }}persona"> 
                <span id="tabla{{$clase}}">
                    @include('personas.detalles.historiaclinica.tabla1', 
                        ['clase' => $clase, 'personaid'=> $personaid, 'objetos' => $objetos])
                </span>
                
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
                                <input type="text" class="form-control" name="descripcion">
                            </div>                
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </form>
                    </div>
                </div>              
            </div>
        </div>
    </div>
</div>


@include('personas.detalles.historiaclinica.editar', ['clase' => $clase, 'descripcion'=>true])