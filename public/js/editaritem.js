function editaritem(ruta, formeditar){
    $.ajax({
        url: ruta, 
        type: "GET",
        data: $(this).serialize(),
        success: function(data){
            $(formeditar).html(data);
        },
        error: function(data){
            console.log(data);
        }
    });
}