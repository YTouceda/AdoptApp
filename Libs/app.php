<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
require_once 'Controller/errores.php';

class App{
    function __construct(){
        // echo "Nueva App";
        error_reporting(E_ALL);
        ini_set('display_errors', '1');

        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url,'/');
        $url = explode('/',$url);

        if(empty($url[0])){
            $archivoController = 'Controller/publicaciones.php';
            require_once $archivoController;
            $controller = new publicaciones();
            $controller->loadModel('publicaciones');
            $controller->Render();
            return;
        }

        // var_dump($url);
        $archivoController = 'Controller/' . $url[0] . '.php';
        if (file_exists($archivoController)) {
            require_once $archivoController;
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            if(isset($url[1])) {
                $controller->{$url[1]}();
            }else{
                $controller->Render();
            }
        }
        else {
            $controller = new Errores();
        }

    }
}

?>