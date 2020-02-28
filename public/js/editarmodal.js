function editarmodalclase(editarclase){
    $(editarclase).on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var desc = button.data('desc');
        var idclase = button.data('idclase');
        
        var modal = $(this);
        modal.find(".modal-body #desc").val(desc);
        modal.find(".modal-body #idclase").val(idclase);
    });
}

