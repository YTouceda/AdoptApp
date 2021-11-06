<?php

    include_once 'user_session.php';

    $userSession = new UsuarioSession();
    $userSession->closeSession();

    header('Location:' . getenv('HTTP_REFERER'))

?>