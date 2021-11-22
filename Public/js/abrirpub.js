$(document).ready(function () {
    $(".denuncia").hide();
    $(".denuncia").attr("disabled");
    $("#botonEliminar").hide();
});
  
    
$("#select-denuncia").change(function(){
    $("#errorDenuncia").hide();
    if($("#select-denuncia").val()=="3"){
        $(".denuncia").show();
    }else{
        $(".denuncia").hide();
        $(".denuncia").attr("disabled");
    }
});
$("#fakeEliminar").click(function(){
    $("#fakeEliminar").attr("disabled",true);
    Swal.fire(
        'Exito!',
        'Tu publicacion fue eliminada exitosamente',
        'success'
      )
      setTimeout(() => {$("#botonEliminar").click()}, 5000);
});
    $("#enviar").click(function validarForm(e){
            var formValido=true;
            var desc=$("#tx-denuncia");
            var errorDescripcion=$("#errorDenuncia");
            var select=$("#select-denuncia");
            var errorSelectDenuncia=$("#errorSelectDenuncia");
            
    
            //Validaciones
          
            //AGREGAR MAX 
            switch (select.val()) {
                case "0": errorSelectDenuncia.hide();
                select.removeClass("is-invalid");
                errorDescripcion.hide();
                desc.removeClass("is-invalid");
                desc.removeAttr("required");
                break;
                case "1": errorSelectDenuncia.hide();
                select.removeClass("is-invalid");
                errorDescripcion.hide();
                desc.removeClass("is-invalid");
                desc.removeAttr("required");
                break;
                case "2": errorSelectDenuncia.hide();
                select.removeClass("is-invalid");
                errorDescripcion.hide();
                desc.removeClass("is-invalid");
                desc.removeAttr("required");
                break;
                case "3": errorSelectDenuncia.hide();
                select.removeClass("is-invalid");
                desc.attr("required");
                if(desc.val().length<10){
                    desc.addClass("is-invalid");
                    var errorElement = errorDescripcion;
                    errorDescripcion.show();
                    formValido=false;
                }else{
                    errorDescripcion.hide();
                    desc.removeClass("is-invalid");
                }
                break;
                default : 
                select.addClass("is-invalid");
                errorSelectDenuncia.show();
                formValido=false;
                break;
            }
            
            
            //console.log(formValido);
            if(!formValido){
                e.preventDefault();
            }else{
                $("#enviar").attr("disabled",true);
                console.log($("#enviar"));
                Swal.fire(
                    'Gracias por colaborar!',
                    'Tu denuncia fue enviada exitosamente',
                    'success'
                  )
                  setTimeout(() => {$("#formdenuncia").submit()}, 3000);
                  
                
            }
        });
        // $(".img-chiquitas").click(function cambiarImagenes(){
        //     var aux= $(this).attr("src");
        //     var grande=$("#img-grande").attr("src");
        //     $(this).attr("src", grande);
        //     $("#img-grande").attr("src",aux);
        
        // });
