<?php
include_once 'Clases/usuario.php';
include_once 'Libs/user_session.php';
class Controller{
    
    function __construct(){
        $this->userSession = new UsuarioSession();
        $this->usuario = new Usuario();
        $this->view = new View();
    }
    
    function loadModel($model){
        $url = 'Model/'.$model.'model.php';
        if(file_exists($url)){
            require $url;
            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
}
?>