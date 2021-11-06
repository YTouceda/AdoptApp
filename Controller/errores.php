<?php

class Errores extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje = "Esta pagina no existe.";
        $this->view->render('errores/index');
    }

}

?>