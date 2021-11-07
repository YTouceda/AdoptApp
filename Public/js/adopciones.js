$(function(){

    get_publicaciones();

})

function get_publicaciones(){
    $.ajax({
        type: "POST",
        url: "Clases/adopciones.php",
        data: "",
        success: function(data){
            $.each(JSON.parse(data), function(publicacion,mascota){
                
            });
        }
    })
}