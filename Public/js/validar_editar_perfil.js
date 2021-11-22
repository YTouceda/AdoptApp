const expRegNombre = /[A-Za-zñáéíóú]{3,}/;
const expRegNumero = /^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/;
const expRegEmail = /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/
function validarTamImagenes(tam) {
    var maxtam=16*1024*1024;
    
        if (tam > maxtam) {
            return false;
    }
    return true;
}
var form = $('.needs-validation');
$('#btn_guardar').click(function (event) {
    if (!validar_formulario()) {
        event.preventDefault();
    }else{
        form.addClass('was-validated');
        $("#btn_guardar").attr("disabled",true);
        Swal.fire(
            'Exito!',
            'Tu perfil fue editado exitosamente!',
            'success'
          )
          setTimeout(() => {$("#form_editar").submit()}, 3000);
    }
});
$('#btn_guardar_datos').click(function (event) {
    if (!validar_formulario()) {
        event.preventDefault();
    }else{
        form.addClass('was-validated');
        form.submit();
    }
});
//Genera las previsualizaciones
function createPreview(file,id_elemento) {
    var imgCodified = URL.createObjectURL(file);
        var img = $('<div id="foto_container" class="col-12"><input type="image" class="d-inline-block col-form-control h-100 w-50 img-agregada" src="'+ imgCodified +'" name="Foto" id="Foto"></input></div>');
        // var img = $('<div class="img-seleccionada col img-agregada" id="img_grande"><img src="'+ imgCodified +'" class="img-fluid" > </div>');
        $($("#foto_container")).replaceWith($(img));
}
function validarCantImagenes(){
    agregadas=$(".img-agregada");
    if (agregadas.length>1){
        return false;
    }
    return true;
}
$(document).on("change", "#add_new_photo", function () {
    var files = this.files;
    var element;
    var supportedImages = ["image/jpeg", "image/png", "image/gif"];
    var seEncontraronElementoNoValidos = false;
    //$("img").remove(".img-agregadas");
  
        element = files[0];
            if(validarTamImagenes(element.size)){
                if (supportedImages.indexOf(element.type) != -1) {
                    createPreview(element,this.id);
                }
                else {
                    seEncontraronElementoNoValidos = true;
                }
            }else{
                return false;
            }
    if (seEncontraronElementoNoValidos) {
        $('#errorImagen').show();
        $('#btn_guardar').addClass("disabled");
        $('#btn_guardar').attr("aria-disabled","true");
    }
    else {
        $('#errorImagen').hide();
        $('#btn_guardar').removeClass("disabled");
    }
});
function validar_formulario() {
    var formIsValid = true;
    var nombreInput = $('#Nombre');
    var numeroInput = $('#Numero');
    var emailInput = $('#Email');
    var divsErrors = $('.invalid-feedback');
    divsErrors.hide();
    
    inputs = [
        nombreInput,
        numeroInput,
        emailInput  
    ]
    for (input of inputs) {
        input.removeClass('is-invalid');
    }
    var nombre = nombreInput.val();
    var numero = numeroInput.val();
    var email = emailInput.val();
    // Validaciones
    nombre = nombre.split(" ");
    if(!(nombre.length >= 2)){
        nombreInput.addClass('is-invalid');
        var text = "Debe contener al menos dos palabras.";
        $('#error_nombre').html(text);
        $('#error_nombre').show();
        formIsValid = false;
    }
    for(palabra of nombre){
        if(!(expRegNombre.test(palabra))){
            nombreInput.addClass('is-invalid');
            var text = "Debe contener al menos dos palabras de 3 caracteres cada una. Solo se permite letras y tildes";
            $('#error_nombre').html(text);
            $('#error_nombre').show();
            formIsValid = false;
        }
    }
    if(nombre==""){
        nombreInput.addClass('is-invalid');
            var text = "No ingresó el nombre de usuario.";
            $('#error_nombre').html(text);
            $('#error_nombre').show();
            formIsValid = false;
    }
    if(numero==""){
        numeroInput.addClass('is-invalid');
        var text = "No ingresó numero de telefono.";
        $('#error_numero').html(text);
        $('#error_numero').show();
        formIsValid = false;
    }
    if(!expRegNumero.test(numero)){
        numeroInput.addClass('is-invalid');
        $('#error_numero').html('El numero de contacto no es correcto.');
        $('#error_numero').show();
        formIsValid = false;
    }
    if(!(expRegEmail.test(email))){
        emailInput.addClass('is-invalid');
        $('#error_email').show();
        formIsValid = false;
    }
    return formIsValid;
}