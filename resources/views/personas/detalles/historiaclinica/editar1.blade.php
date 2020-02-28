<div class="modal fade" id="editar{{$clase}}" tabindex="-1" role="dialog" aria-labelledby="editar{{$clase}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formeditar{{$clase}}" method="POST">
                @csrf
                
                <div class="modal-body">
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" class="form-control" name="descripcion" id="desc" value="">
                        <input type="hidden" name="id" id="idclase" value="">
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>