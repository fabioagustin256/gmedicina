function editarmodalclase(editarclase, idfecha){
    $(editarclase).on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var idclase = button.data('idclase');    
        modal.find(".modal-body #idclase").val(idclase);

        if(button.data(idfecha)){ 
            var fec = button.data(idfecha);        
            modal.find(".modal-body #"+ idfecha).val(fec);
        }

        if(button.data('desc')){ 
            var desc = button.data('desc');         
            modal.find(".modal-body #desc").val(desc);
        }

        if(button.data('ttipo')){ 
            var ttipo = button.data('ttipo');         
            modal.find(".modal-body #ttipo").val(ttipo);
        }

        if(button.data('eecografista')){ 
            var eecografista = button.data('eecografista');         
            modal.find(".modal-body #eecografista").val(eecografista);
        }

        if(button.data('rresumen')){ 
            var rresumen = button.data('rresumen');         
            modal.find(".modal-body #rresumen").val(rresumen);
        }
        
        if(button.data('mmotivo')){ 
            var mmotivo = button.data('mmotivo');         
            modal.find(".modal-body #mmotivo").val(mmotivo);
        }

        if(button.data('ttratamiento')){ 
            var ttratamiento = button.data('ttratamiento');         
            modal.find(".modal-body #ttratamiento").val(ttratamiento);
        }
    });
}

