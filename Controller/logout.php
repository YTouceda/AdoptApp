<?php
    include_once 'Libs/user_session.php';
    $userSession = new UsuarioSession();
    $userSession->closeSession();
    if(isset($_GET['estadoBloqueo'])){
        header('Location:publicaciones');
    }else{
        header('Location:' . getenv('HTTP_REFERER'));
    }
?>