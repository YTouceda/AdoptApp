$(document).ready(function () {
    consultaNotificaciones();
    setInterval(consultaNotificaciones,60000);
})

function consultaNotificaciones()
{
    var nuevaNoti = "";
    $.ajax({
        url: 'notificaciones',
        type: 'POST',
        dataType: "json",
        success:  function (response){
            for(var i = 0 ; i < 5 ; i++){
                if(response["NOTIFICACIONES"][i].ESTADO == "sin leer"){
                    nuevaNoti +="<div id='notificacion"+i+"'>"+
                                    "<input type='hidden' value='"+response["NOTIFICACIONES"][i].ESTADO+"'>"+
                                    "<a href='"+response["NOTIFICACIONES"][i].URL+"' class='div_notificacion_opc list-group-item list-group-item-action'>"+
                                        "<div class='d-flex justify-content-between div_notificacion'>"+
                                            "<h5 class='mb-1'>"+response["NOTIFICACIONES"][i].TITULO+"</h5>"+
                                            "<label class='invisible'>"+
                                                "<i class='icono_menu_notificacion fas fa-ellipsis-h'></i>"+
                                            "</label>"+
                                            "<span class='position-absolute alerta-notificacion-sin-leer top-0 end-0 badge border border-light rounded-circle bg-danger p-1 mt-1 me-1'>"+
                                            "<span class='visually-hidden'>unread messages</span>"+
                                            "</span>"+
                                        "</div>"+
                                        "<p class='mb-1'>"+response["NOTIFICACIONES"][i].MOTIVO+"</p>"+
                                        "<small>"+response["NOTIFICACIONES"][i].FECHA_ALTA+"</small>"+
                                    "</a>"+
                                "</div>";
                }
                else{
                    nuevaNoti +="<div id='notificacion"+i+"'>"+
                                    "<input type='hidden' value='"+response["NOTIFICACIONES"][i].ESTADO+"'>"+
                                    "<a href='"+response["NOTIFICACIONES"][i].URL+"' class='div_notificacion_opc list-group-item list-group-item-action'>"+
                                        "<div class='d-flex justify-content-between div_notificacion'>"+
                                            "<h5 class='mb-1'>"+response["NOTIFICACIONES"][i].TITULO+"</h5>"+
                                            "<label class='invisible'>"+
                                                "<i class='icono_menu_notificacion fas fa-ellipsis-h'></i>"+
                                            "</label>"+
                                        "</div>"+
                                        "<p class='mb-1'>"+response["NOTIFICACIONES"][i].MOTIVO+"</p>"+
                                        "<small>"+response["NOTIFICACIONES"][i].FECHA_ALTA+"</small>"+
                                    "</a>"+
                                "</div>";
                }
            }
            var contenido = $('#notificacion_list');
            contenido.html(nuevaNoti);

            $("#notificacion0").hover(function(){
                $("#notificacion0").children("a").children("div").children("label").removeClass("invisible");
            },function(){
                $("#notificacion0").children("a").children("div").children("label").addClass('invisible');
            });
            
            $("#notificacion1").hover(function(){
                $("#notificacion1").children("a").children("div").children("label").removeClass("invisible");
            },function(){
                $("#notificacion1").children("a").children("div").children("label").addClass('invisible');
            });
            
            $("#notificacion2").hover(function(){
                $("#notificacion2").children("a").children("div").children("label").removeClass("invisible");
            },function(){
                $("#notificacion2").children("a").children("div").children("label").addClass('invisible');
            });
            
            $("#notificacion3").hover(function(){
                $("#notificacion3").children("a").children("div").children("label").removeClass("invisible");
            },function(){
                $("#notificacion3").children("a").children("div").children("label").addClass('invisible');
            });
            
            $("#notificacion4").hover(function(){
                $("#notificacion4").children("a").children("div").children("label").removeClass("invisible");
            },function(){
                $("#notificacion4").children("a").children("div").children("label").addClass('invisible');
            });
        }
    });

    
}