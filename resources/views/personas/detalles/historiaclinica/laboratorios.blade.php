<div class="card">
    <div class="card-header" role="tab" id="laboratorioHeaderId">
        <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordianId" href="#laboratorioContentId" aria-expanded="true" aria-controls="laboratorioContentId">
                Laboratorios
            </a>
        </h5>
    </div>
    <div id="laboratorioContentId" class="collapse" role="tabpanel" aria-labelledby="laboratorioHeaderId">
        <div class="card-body">
            <div id="tablalaboratoriopersona">
                
                <span id="tablalaboratorio">
                    @include('personas.detalles.historiaclinica.tablalaboratorio', 
                        ['clase' => 'laboratorio', 'personaid'=> $persona->id, 'objetos' => $persona->laboratorios])
                </span>
                
                <p>
                    <a class="btn btn-success" data-toggle="collapse" href="#nuevolaboratorio" role="button" aria-expanded="false" aria-controls="collapseclase">
                        Agregar
                    </a>
                </p>
                        
                <div class="collapse" id="nuevolaboratorio">
                    <div class="card card-body">        
                        <form method="POST" id="formnuevolaboratorio">
                            @csrf
                            <div class="form-group">
                                <label for="fecha" class="col-form-label">Fecha:</label>
                                <input type="text" class="form-control fecha" id="fechalaboratorio" name="fecha" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <input type="text" class="form-control" name="descripcion" required>
                            </div>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </form>
                    </div>
                </div> 

            </div>
        </div>
    </div>
</div>

@include('personas.detalles.historiaclinica.editar', ['clase' => 'laboratorio', 'fecha'=>true, 'id_fecha'=>'fecha_laboratorio', 'descripcion'=>true])