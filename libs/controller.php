<?php

include_once 'user.php';
include_once 'user_session.php';


class Controller{
    
    function __construct(){
        $this->userSession = new UserSession();
        $this->user = new User();
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