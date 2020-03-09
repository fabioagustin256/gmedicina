<div class="card">
    <div class="card-header" role="tab" id="otrometodoHeaderId">
        <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordianId" href="#otrometodoContentId" aria-expanded="true" aria-controls="otrometodoContentId">
                Otros metodos de diagnóstico
            </a>
        </h5>
    </div>
    <div id="otrometodoContentId" class="collapse" role="tabpanel" aria-labelledby="otrometodoHeaderId">
        <div class="card-body">
            <div id="tablaotrometodopersona">
                
                <span id="tablaotrometodo">
                    @include('personas.detalles.historiaclinica.tablaotrometodo', 
                        ['clase' => 'otrometodo', 'personaid'=> $persona->id, 'objetos' => $persona->otros_metodos])
                </span>
                
                <p>
                    <a class="btn btn-success" data-toggle="collapse" href="#nuevootrometodo" role="button" aria-expanded="false" aria-controls="collapseclase">
                        Agregar
                    </a>
                </p>
                        
                <div class="collapse" id="nuevootrometodo">
                    <div class="card card-body">        
                        <form method="POST" id="formnuevootrometodo">
                            @csrf
                            <div class="form-group">
                                <label for="fecha" class="col-form-label">Fecha:</label>
                                <input type="text" class="form-control fecha" id="fechaotrometodo" name="fecha" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Tipo:</label>
                                <input type="text" class="form-control" name="tipo" id="tipo" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" required>
                            </div>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </form>
                    </div>
                </div> 

            </div>
        </div>
    </div>
</div>

@include('personas.detalles.historiaclinica.editar', ['clase' => 'otrometodo', 'fecha'=>true, 'id_fecha'=>'fecha_otros_metodos', 'tipo'=>true, 'descripcion'=>true])