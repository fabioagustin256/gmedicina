function actualizaritem(nuevoitem, formulario, ruta, tabla){
    $(formulario).submit(function(e){
        e.preventDefault();
        $.ajax({
            url: ruta, 
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
                $(tabla).html(data);                
                $(nuevoitem).modal('toggle');
            },
            error: function(data){
                console.log(data);
            }
        });
    });
}


