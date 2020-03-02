<div class="card">
    <div class="card-header" role="tab" id="consultaHeaderId">
        <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordianId" href="#consultaContentId" aria-expanded="true" aria-controls="consultaContentId">
                Consultas
            </a>
        </h5>
    </div>
    <div id="consultaContentId" class="collapse" role="tabpanel" aria-labelledby="consultaHeaderId">
        <div class="card-body">
            <div id="tablaconsultapersona">
                
                <span id="tablaconsulta">
                    @include('personas.detalles.historiaclinica.tablaconsulta', 
                        ['clase' => 'consulta', 'personaid'=> $persona->id, 'objetos' => $persona->consultas])
                </span>
                
                <p>
                    <a class="btn btn-success" data-toggle="collapse" href="#nuevoconsulta" role="button" aria-expanded="false" aria-controls="collapseclase">
                        Agregar
                    </a>
                </p>
                        
                <div class="collapse" id="nuevoconsulta">
                    <div class="card card-body">        
                        <form method="POST" id="formnuevoconsulta">
                            @csrf
                            <div class="form-group">
                                <label for="fecha" class="col-form-label">Fecha:</label>
                                <input type="text" class="form-control fecha" id="fechaconsulta" name="fecha" required>
                            </div>
                            <div class="form-group">    
                                <label for="motivo">Motivo</label>
                                <textarea class="form-control" name="motivo" rows="3" required></textarea>     
                            </div>
                            <div class="form-group">    
                                <label for="tratamiento">Tratamiento</label>
                                <textarea class="form-control" name="tratamiento" rows="3" required></textarea>   
                            </div>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

@include('personas.detalles.historiaclinica.editar', ['clase' => 'consulta', 'fecha'=>true, 'motivo'=>true, 'tratamiento'=>true])