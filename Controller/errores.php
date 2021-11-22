<?php



class Errores extends Controller{



    function __construct(){

        parent::__construct();

        
        //$this->view->render('errores/index');
        
    }
    function Render(){
        $this->view->mensaje = "Esta pagina no existe.";
        $this->view->render('errores/index');
    }

    function Suspension(){
        $this->view->mensaje = "La publicación está suspendida.";
        $this->view->render('errores/index');

    }



}



?>