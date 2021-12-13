var url=$("#id_url").val();
$('button.btn_eliminar').hover(function(event){
    //console.log($("#"+event.target.parentElement.attributes[0].value));
    div_padre = event.target.parentElement.attributes[0].value;
    id_postulacion=$('#'+div_padre)[0].children[2].value;
    console.log(id_postulacion);
    //console.log(event);
    $('#form_postulados').attr('action',url+"abrir_publicacion/eliminar_postulacion?id_postulacion="+id_postulacion);
    console.log($("#form_postulados"));
})
$('button.btn_aceptar').hover(function(event){
    div_padre = event.target.parentElement.attributes[0].value;
    id_postulacion=$('#'+div_padre)[0].children[2].value;
    //console.log($("#"+event.target.parentElement.attributes[0].value));
    console.log(id_postulacion);
    //console.log(event);
    $('#form_postulados').attr('action',url+"abrir_publicacion/aceptar_postulacion?id_postulacion="+id_postulacion);
    console.log($("#form_postulados"));
})