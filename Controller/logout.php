<?php

    include_once 'Libs/user_session.php';

    $userSession = new UsuarioSession();
    $userSession->closeSession();

    header('Location:' . getenv('HTTP_REFERER'))

?>