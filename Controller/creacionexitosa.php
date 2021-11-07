<?php 

include_once 'Clases/publicacion.php';

class Creacionexitosa extends Controller{
    function __construct(){
        parent::__construct();
        
    }

    function render(){
        $this->view->render('creacionexitosa/index');
    }

}

?>