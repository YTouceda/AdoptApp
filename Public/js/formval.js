$(document).on("click", "#add-photo", function(){
    $("#input_add_photo").click();
});

$(document).ready(function(){
$(".add_photo").hide();


});


function validarTamImagenes(tam) {
    var maxtam=16*1024*1024;
    //console.log(tam , maxtam);
    
        if (tam > maxtam) {
            return false;
    }
    return true;
}

function redireccionar(){
    window.location.href = "adopciones";
  }
   
 




//Genera las previsualizaciones
function createPreview(file,id_elemento) {
    var imgCodified = URL.createObjectURL(file);


    switch(id_elemento){
        case "input_add_photo1":
            var img = $('<div class="img-seleccionada col img-agregada" id="img_grande"><img src="'+ imgCodified +'" class="img-fluid" > </div>');
            $($("#img_grande")).replaceWith($(img));
            break;
        default:
            console.log("Error de imagen");
        break;
            


    }
    

}
function validarCantImagenes(){
    agregadas=$(".img-agregada");
    //console.log(agregadas.length);
    if (agregadas.length==0 || agregadas.length>5){
        return false;
    }
    return true;
}


$(document).on("change", ".add_photo", function () {
    $("#errorFotos").hide();

    var files = this.files;
    var element;
    var supportedImages = ["image/jpeg", "image/png", "image/gif"];
    var seEncontraronElementoNoValidos = false;
    //$("img").remove(".img-agregadas");

  
        element = files[0];
        //console.log(element);

            if(validarTamImagenes(element.size)){
                if (supportedImages.indexOf(element.type) != -1) {
                    createPreview(element,this.id);
                }
                else {
                    seEncontraronElementoNoValidos = true;
                    alert("Tipo de imagen invalida");
                    $("#errorFotos").show();
                }
            }else{
                return false;
            }

    
    if (seEncontraronElementoNoValidos) {
        $("#errorFotos").show();
        alert("Tipo de imagen invalida");
    }
    else {
        return true;
    }

});


    function validarRegExpNombre(str){
        var regExpResult = new RegExp ("[A-Za-z]") ;
        return regExpResult.test(str);
    }

    function validarRegExpTel(str){
        var regExpResult =  /^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/;
        return regExpResult.test(str);
    }

// $("#test").click(function test(e){
//     console.log($("#provincia").val());
//     console.log($("#localidades").val());
// });

    $("#enviar").click(function validarForm(e){
            var formValido=true;
            var nombre=$("#nombre");
            var errorNombre=$("#errorNombre");
            var telefono=$("#telefono");
            var errorTelefono=$("#errorTelefono");
            var estado=$("#select-estado");
            var errorEstado=$("#errorEstado")
            var tipo=$("#select-tipo");
            var errorTipo=$("#errorTipo")
            var sexo=$("#select-sexo");
            var errorSexo=$("#errorSexo")
            var tam=$("#select-tam");
            var errorTamaño=$("#errorTamaño")
            var edad=$("#select-edad");
            var errorEdad=$("#errorEdad")
            var desc=$("#text-desc");
            var errorDescripcion=$("#errorDescripcion")
            var provincia=$("#provincia");
            var errorProvincia=$("#errorProvincia")
            var localidades=$("#localidades");
            var errorLocalidades=$("#errorLocalidades");
            var inputImagenes=$("#input-imagenes");
            var errorCantImagenes=$("#errorImagenes1");
            var errorTamImagenes=$("#errorImagenes2");
    
            //Validaciones
          

            //NOMBRE
            //console.log(nombre.val());
            if(nombre.val()==""){
                nombre.addClass("is-invalid");
                var errorElement = errorNombre;
                errorNombre.show();
                formValido=false;
            }else{
            if (validarRegExpNombre(nombre.val())){
                errorNombre.hide();
                nombre.removeClass("is-invalid");
            }else{
                nombre.addClass("is-invalid");
                var errorElement = errorNombre;
                errorNombre.show();
                formValido=false;
            }
        }

        //console.log(telefono.val());
        if(telefono.val()==""){
            telefono.addClass("is-invalid");
            var errorElement = errorTelefono;
            errorTelefono.show();
            formValido=false;
        }else{
        if (validarRegExpTel(telefono.val())){
            errorTelefono.hide();
            telefono.removeClass("is-invalid");
        }else{
            telefono.addClass("is-invalid");
            var errorElement = errorTelefono;
            errorTelefono.show();
            formValido=false;
        }
    }

            
        console.log(estado.val());
            switch(estado.val()){
                case "1": 
                errorEstado.hide();
                estado.removeClass("is-invalid");
                break;
                case "2":
                errorEstado.hide();
                estado.removeClass("is-invalid");
                break;
                case "3":
                errorEstado.hide();
                estado.removeClass("is-invalid");
                break;
                default:
                estado.addClass("is-invalid");
                var errorElement = errorEstado;
                errorEstado.show();
                formValido=false;
                break;
                
            }
            //console.log(tipo.val());
            switch(tipo.val()){
                case "1": 
                errorTipo.hide();
                tipo.removeClass("is-invalid");
                break;
                case "2":
                errorTipo.hide();
                tipo.removeClass("is-invalid");
                break;
                default:
                tipo.addClass("is-invalid");
                var errorElement = errorTipo;
                errorTipo.show();
                formValido=false;
                break;
                
            }
            //console.log(sexo.val());
            switch(sexo.val()){
                case "1": 
                errorSexo.hide();
                sexo.removeClass("is-invalid");
                break;
                case "2":
                errorSexo.hide();
                sexo.removeClass("is-invalid");
                break;
                default:
                sexo.addClass("is-invalid");
                var errorElement = errorSexo;
                errorSexo.show();
                formValido=false;
                break;
                
            }
            //console.log(tam.val());
            switch(tam.val()){
                case "1": 
                errorTamaño.hide();
                tam.removeClass("is-invalid");
                break;
                case "2":
                errorTamaño.hide();
                tam.removeClass("is-invalid");
                break;
                case "3":
                errorTamaño.hide();
                tam.removeClass("is-invalid");
                break;
                default:
                tam.addClass("is-invalid");
                var errorElement = errorTamaño;
                errorTamaño.show();
                formValido=false;
                break;
                
            }
            //console.log(edad.val());
            switch(edad.val()){
                case "1": 
                errorEdad.hide();
                edad.removeClass("is-invalid");
                break;
                case "2":
                errorEdad.hide();
                edad.removeClass("is-invalid");
                break;
                case "3":
                errorEdad.hide();
                edad.removeClass("is-invalid");
                break;
                default:
                edad.addClass("is-invalid");
                var errorElement = errorEdad;
                errorEdad.show();
                formValido=false;
                break;
                
            }
            //agregar maximo
            //console.log(desc.val());
            if(desc.val().length<50){
                desc.addClass("is-invalid");
                var errorElement = errorDescripcion;
                errorDescripcion.show();
                formValido=false;
            }else{
                errorDescripcion.hide();
                desc.removeClass("is-invalid");
            }

            if(provincia.val()==""){
                provincia.addClass("is-invalid");
                var errorElement = errorProvincia;
                errorProvincia.show();
                formValido=false;
                console.log("tiro falso");
            }else{
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
            }
            
            
            if(localidades.val()==""){
                localidades.addClass("is-invalid");
                var errorElement = errorLocalidades;
                errorLocalidades.show();
                formValido=false;
                console.log("tiro falso");
            }else{
                errorLocalidades.hide();
                localidades.removeClass("is-invalid");
            }

            if(validarCantImagenes()){
                errorCantImagenes.hide();
                inputImagenes.removeClass("is-invalid");
            }else{
                inputImagenes.addClass("is-invalid");
                var errorElement = errorCantImagenes;
                errorCantImagenes.show();
                formValido=false;
            }

            if(validarTamImagenes()){
                errorTamImagenes.hide();
                inputImagenes.removeClass("is-invalid");
            }else{
                inputImagenes.addClass("is-invalid");
                var errorElement = errorTamImagenes;
                errorTamImagenes.show();
                formValido=false;
            }
            if (validarCantImagenes()){

                $("#errorFotos").hide();
            }else{
                $("#errorFotos").show();
                formValido=false;
            }
            



            console.log(formValido);
            if(!formValido){
                e.preventDefault();
            }else{
                $("#enviar").attr("disabled",true);
                Swal.fire(
                    'Bien hecho!',
                    'Tu publicación fue creada exitosamente',
                    'success'
                  )
                  setTimeout(() => {$("#formcp").submit()}, 3000);
               
            }
        });


// ubicacion

class Localidad{
constructor(varNombre,idLoc,idPro){
    this.nombre=varNombre;
    this.id_localidad=idLoc;
    this.id_provincia=idPro;
}
}

$(document).ready(function () {
var respuesta;
$.ajax({
    //url: 'getLocalidades.php',
    url: 'Public/Otros/localidades.json',
    type:  'get',
    beforeSend: function () {
            //console.log("enviando");
    },
    success:  function (response) {
        //$("#resultado").html(response);
        //agregarItems(response);
        respuesta=response;
    }
});

const filtrar =(data, filtro)=>{
    let $option, elemento, nombre, id_localidad, id_provincia, loc;
    var localidades=[];
    $(data["localidades-censales"]).each((index)=>{
        var aux=new Localidad();
        elemento= data["localidades-censales"][index];
        if (filtro == elemento.provincia.id){
            aux.nombre = elemento.nombre;
            aux.id_localidad= elemento.id;
            aux.id_provincia=elemento.provincia.id;
            localidades.push(aux);
        }          
    })
    localidades = ordenarLocalidades(localidades);
    $(localidades).each((index)=>{
        loc = localidades[index];
        $option+= `<option value='${loc.id_localidad}' data-p='${loc.id_provincia}'> ${loc.nombre} </option>`;
    })
    $("#localidades").html($option);
}


const cambiarLoc= ()=>{
    $("#ilocalidades").val("");
    let id_provincia = $("#provincia option:selected").val();
    filtrar(respuesta, id_provincia);
}    

const seleccionarLoc= ()=>{
    //envia lo seleccionado al input
    let loc = $("#localidades option:selected").data("l")
    $("#xlocalidad").val(loc);
}

$("#provincia").on("change", cambiarLoc);
$("#localidades").change( ()=>{
    seleccionarLoc();
})

function ordenarLocalidades(loc){
    var aux;
    for ( var i = 1 ; i < loc.length ; i++ ){
        for ( var x = 0 ; x < loc.length - i ; x++ ){
            if (loc[x].nombre > loc[x+1].nombre){
                aux=loc[x];
                loc[x]=loc[x+1];
                loc[x+1]=aux;
            }
        }
    }
    return loc;
}

});


