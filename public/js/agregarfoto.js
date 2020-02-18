function agregarfoto(nuevoitem, formulario, ruta, tabla){
    $(formulario).submit(function(e){
        e.preventDefault();
        var form = $(formulario)[0];
        var data = new FormData(form);
        $.ajax({
            url: ruta, 
            type: "post",
            dataType: "html",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                $(tabla).html(data);                
                $(nuevoitem).collapse('toggle');
                $(formulario)[0].reset();
            },
            error: function(data){
                console.log(data);
            }
        });
    });
}