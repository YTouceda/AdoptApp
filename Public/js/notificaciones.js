$(document).ready(function () {
    consultaNotificaciones();
    setInterval(consultaNotificaciones,60000);
})

function consultaNotificaciones()
{
    var nuevaNoti = "";
    var fiveNoti = "";
    $.ajax({
        url: 'notificaciones',
        type: 'POST',
        dataType: "json",
        success:  function (response){
            var notis_estado = false;
            $(response["NOTIFICACIONES"]).each((index)=>{
                if(response["NOTIFICACIONES"][index].ESTADO == "no leído"){
                    notis_estado = true;
                }
                nuevaNoti +="<div id='notificacion"+index+"' id_notificacion='"+response["NOTIFICACIONES"][index].ID_NOTIFICACION+"' class='position-relative list-group-item list-group-item-action notification_hover div_notificacion_opc'>"+
                                "<input type='hidden' value='"+response["NOTIFICACIONES"][index].ESTADO+"'>"+
                                "<a href='"+response["NOTIFICACIONES"][index].URL+"' class='text-decoration-none text-black'>"+
                                    "<div class='d-flex justify-content-between div_notificacion'>"+
                                        "<h5 class='mb-1'>"+response["NOTIFICACIONES"][index].TITULO+"</h5>"+
                                        "<small class='position-absolute top-0 end-0 mt-1 me-3'>"+response["NOTIFICACIONES"][index].FECHA_ALTA+"</small>";
                if(response["NOTIFICACIONES"][index].ESTADO == "no leído"){
                    nuevaNoti +=        "<span class='position-absolute alerta-notificacion-sin-leer top-0 end-0 badge border border-light rounded-circle bg-danger p-1 mt-1 me-1'>"+
                                        "<span class='visually-hidden'>unread messages</span>"+
                                        "</span>";
                }
                nuevaNoti +=        "</div>"+
                                    "<p class='mb-1'>"+response["NOTIFICACIONES"][index].MOTIVO+"</p>"+
                                    "</a>"+
                                    "<div class='div_botones invisible'>"+
                                        "<button id='btn_eliminar_notificacion"+[index]+"' class='btn btn-link btn_notificacion mx-auto mx-xl-2'>Eliminar notificación</button>"+
                                        "<button id='btn_cambiar_estado"+[index]+"' class='btn btn-link btn_notificacion mx-auto mx-xl-2'>Marcar como ";
                if(response["NOTIFICACIONES"][index].ESTADO == "no leído"){
                    nuevaNoti += "leído</button>";
                }else{
                    nuevaNoti += "no leído</button>";
                }
                nuevaNoti +=        "</div>"+
                                "</div>";
                if(index == 4){
                    fiveNoti = nuevaNoti;
                }
            })

            if(notis_estado == true){
                $('#alerta_sin_leer').removeClass('invisible');
            }else{
                $('#alerta_sin_leer').addClass('invisible');
            }

            var contenido = $('#notificacion_list');
            contenido.html(fiveNoti);
            
            var contenido1 = $('#notificacion_list_com');
            contenido1.html(nuevaNoti);


            $(".notification_hover").hover(function(event){
                $("#"+event.currentTarget.id).children("div.div_botones").removeClass("invisible");
            },function(event){
                $("#"+event.currentTarget.id).children("div.div_botones").addClass('invisible');
            });

            $(".notification_hover").click(function(event){
                var accion = event.currentTarget.childNodes[0].attributes[1].value;
                if(accion == "no leído"){
                    cambiarEstado(event.currentTarget.attributes[1].value,"leído");
                }
            });

            $('.btn_notificacion').click(function(event){
                var accion = $("#"+event.currentTarget.id).html();
                if(accion == "Marcar como leído"){
                    cambiarEstado(event.currentTarget.offsetParent.attributes[1].value,"leído");
                }
                else if(accion == "Marcar como no leído"){
                    cambiarEstado(event.currentTarget.offsetParent.attributes[1].value,"no leído");
                }
                else if(accion == "Eliminar notificación"){
                    cambiarEstado(event.currentTarget.offsetParent.attributes[1].value,"eliminada");
                }
            })
        }
    });
}

function cambiarEstado(id_notificacion,accion){
    consultaNotificaciones();
    $.ajax({
        type: 'get',
        url: 'notificaciones/cambiarEstado',
        contentType: "applicaction/json; charset=utf-8",
        data: {
            id: id_notificacion,
            cambio: accion,
        },
        dataType: "json",
        success:  function (){
            consultaNotificaciones();
        }
    })
}