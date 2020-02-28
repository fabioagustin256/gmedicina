<div class="card">
    <div class="card-header" role="tab" id="ecografiaHeaderId">
        <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordianId" href="#ecografiaContentId" aria-expanded="true" aria-controls="ecografiaContentId">
                Ecografias
            </a>
        </h5>
    </div>
    <div id="ecografiaContentId" class="collapse" role="tabpanel" aria-labelledby="ecografiaHeaderId">
        <div class="card-body">
            <div id="tablaecografiapersona">
                
                <span id="tablaecografia">
                    @include('personas.detalles.historiaclinica.tablaecografia', 
                        ['clase' => 'ecografia', 'personaid'=> $persona->id, 'objetos' => $persona->ecografias])
                </span>
                
                <p>
                    <a class="btn btn-success" data-toggle="collapse" href="#nuevoecografia" role="button" aria-expanded="false" aria-controls="collapseclase">
                        Agregar
                    </a>
                </p>
                        
                <div class="collapse" id="nuevoecografia">
                    <div class="card card-body">        
                        <form method="POST" id="formnuevoecografia">
                            @csrf
                            <div class="form-group">
                                <label for="fecha" class="col-form-label">Fecha:</label>
                                <input type="text" class="form-control" id="fechaecografia" name="fecha" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Tipo:</label>
                                <input type="text" class="form-control" name="tipo">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Ecografista:</label>
                                <input type="text" class="form-control" name="ecografista" id="ecografista">
                            </div>
                            <div class="form-group">    
                                <label for="resumen">Resumen:</label>
                                <textarea class="form-control" name="resumen" rows="3" required></textarea>   
                            </div>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </form>
                    </div>
                </div> 

            </div>
        </div>
    </div>
</div>