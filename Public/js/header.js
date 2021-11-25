$(document).ready(function () {
    
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1204185510091535',
            cookie     : true,
            xfbml      : true,
            version    : 'v12.0'
        });
        
        FB.AppEvents.logPageView();
        
    };
    (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    
    $('#btn-iniciarSesion').click(onlogin);
})
function onlogin(){
    FB.login((response) => {
        
        if(response.authResponse){
            FB.api('/me?fields=email,name,picture',(response) =>{
                $('#login_email').val(response.email);
                $('#login_nombre').val(response.name);
                $('#login_id').val(response.id);
                $('#login_foto').val(response.picture.data.url);
                $('#btn_iniciar_container').submit();
            })
        }
        if(response.status === 'connected'){
            $('#cont-logo').removeClass('col-6');
            $('#cont-logo').addClass('col-12');
        }
    })
}

$("#alert_crear_publicacion").click(function(){
    Swal.fire(
        'ERROR!',
        'Debes iniciar sesion para crear una publicacion',
        'error'
    )
});

$("#alert_crear_publicacion_dw").click(function(){
    Swal.fire(
        'ERROR!',
        'Debes iniciar sesion para crear una publicacion',
        'error'
    )
});