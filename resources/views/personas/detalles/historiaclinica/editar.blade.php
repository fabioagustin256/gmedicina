<div class="modal fade" id="editar{{$clase}}" tabindex="-1" role="dialog" aria-labelledby="editar{{$clase}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formeditar{{$clase}}" method="POST">
                @csrf
                
                <div class="modal-body">
                    @isset($fecha)
                        <div class="form-group">
                            <label for="fec" class="col-form-label">Fecha:</label>
                            <input type="text" class="form-control fecha" name="fecha" id="{{ $id_fecha }}" value="" required>
                        </div>
                    @endisset    

                    @isset($descripcion)
                        <div class="form-group">
                            <label for="desc">Descripción:</label>
                            <input type="text" class="form-control" name="descripcion" id="desc" value="" required>
                        </div>
                    @endisset
                    
                    @isset($tipo)
                        <div class="form-group">
                            <label for="ttipo">Tipo:</label>
                            <input type="text" class="form-control" name="tipo" id="ttipo" value="">
                        </div>
                    @endisset  

                    @isset($ecografista)
                        <div class="form-group">
                            <label for="eecografista">Ecografista:</label>
                            <input type="text" class="form-control" name="ecografista" id="eecografista" value="">
                        </div>                    
                    @endisset

                    @isset($resumen)
                        <div class="form-group">    
                            <label for="rresumen">Resumen:</label>
                            <textarea class="form-control" name="resumen" id="rresumen" rows="3" value=""></textarea>   
                        </div>                    
                    @endisset

                    @isset($motivo)
                        <div class="form-group">    
                            <label for="mmotivo">Motivo</label>
                            <textarea class="form-control" name="motivo" id="mmotivo" rows="3" value="" required></textarea>     
                        </div>
                    @endisset

                    @isset($tratamiento)
                        <div class="form-group">    
                            <label for="ttratamiento">Tratamiento</label>
                            <textarea class="form-control" name="tratamiento" id="ttratamiento" rows="3" value="" required></textarea>   
                        </div>
                    @endisset

                    <input type="hidden" name="id" id="idclase" value="">
                                     
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>