var url=$("#id_url").val();
$('button.btn_eliminar').hover(function(event){
    div_padre = event.target.parentElement.attributes[0].value;
    id_postulacion=$('#'+div_padre).children('input').val();
    $('#form_postulados').attr('action',url+"abrir_publicacion/eliminar_postulacion?id_postulacion="+id_postulacion);
})
$('button.btn_aceptar').hover(function(event){
    div_padre = event.target.parentElement.attributes[0].value;
    id_postulacion=$('#'+div_padre).children('input').val();
    $('#form_postulados').attr('action',url+"abrir_publicacion/aceptar_postulacion?id_postulacion="+id_postulacion);
})