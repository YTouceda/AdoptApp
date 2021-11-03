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
    window.location.href = "main";
  }
   
 




//Genera las previsualizaciones
function createPreview(file,id_elemento) {
    var imgCodified = URL.createObjectURL(file);


    switch(id_elemento){
        case "input_add_photo1":
            var img = $('<div class="img-seleccionada col img-agregada" id="img_grande"><img src="'+ imgCodified +'" class="img-fluid" > </div>');
            $($("#img_grande")).replaceWith($(img));
            break;
        case "input_add_photo2":
            var img = ('<div class="img-chiq col col-3 img-agregada" id="img_chiq1"><img src="'+ imgCodified +'" class="img-fluid" > </div>');
            $($("#img_chiq1")).replaceWith($(img));
            break;
            
        case "input_add_photo3":
            var img = ('<div class="img-chiq col col-3 img-agregada" id="img_chiq2"><img src="'+ imgCodified +'" class="img-fluid" > </div>');
            $($("#img_chiq2")).replaceWith($(img));
            break;
            
        case "input_add_photo4":
            var img = ('<div class="img-chiq col col-3 img-agregada" id="img_chiq3"><img src="'+ imgCodified +'" class="img-fluid" > </div>');
            $($("#img_chiq3")).replaceWith($(img));
            break;
            
        case "input_add_photo5":
            var img = ('<div class="img-chiq col col-3 img-agregada" id="img_chiq4"><img src="'+ imgCodified +'" class="img-fluid" > </div>');
            $($("#img_chiq4")).replaceWith($(img));
            break;
        default:
            console.log("Que tratabas de hacer pillín ?");
        break;
            


    }
    

}
function validarCantImagenes(){
    agregadas=$(".img-agregada");
    console.log(agregadas.length);
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
        console.log(element);

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



    $("#publicar").click(function validarForm(e){
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
            console.log(nombre.val());
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

        console.log(telefono.val());
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
                case "adopcion": 
                errorEstado.hide();
                estado.removeClass("is-invalid");
                break;
                case "encontrado":
                errorEstado.hide();
                estado.removeClass("is-invalid");
                break;
                case "perdido":
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
                case "perro": 
                errorTipo.hide();
                tipo.removeClass("is-invalid");
                break;
                case "gato":
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
                case "hembra": 
                errorSexo.hide();
                sexo.removeClass("is-invalid");
                break;
                case "macho":
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
                case "pequeño": 
                errorTamaño.hide();
                tam.removeClass("is-invalid");
                break;
                case "mediano":
                errorTamaño.hide();
                tam.removeClass("is-invalid");
                break;
                case "grande":
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
                case "cachorro": 
                errorEdad.hide();
                edad.removeClass("is-invalid");
                break;
                case "adulto":
                errorEdad.hide();
                edad.removeClass("is-invalid");
                break;
                case "anciano":
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
            //console.log(provincia.val());
            switch(provincia.val()){
                case "06": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "10": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "22": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "26": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "02": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "14": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "18": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "30": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "30": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "34": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "38": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "42": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "46": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "50": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "54": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "58": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "62": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "66": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "74": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "78": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "82": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "86": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                case "94": 
                errorProvincia.hide();
                provincia.removeClass("is-invalid");
                break;
                default:
                provincia.addClass("is-invalid");
                var errorElement = errorProvincia;
                errorProvincia.show();
                formValido=false;
                break;
                
            }
            //console.log(localidades.val());
            if(localidades.val()==""){
                localidades.addClass("is-invalid");
                var errorElement = errorLocalidades;
                errorLocalidades.show();
                formValido=false;
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
            



    
            if(!formValido){
                e.preventDefault;
            }else{
                alert("Publicacion enviada exitosamente");
                setTimeout("redireccionar()", 3000);
               
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
    url: 'Public/otros/localidades.json',
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

