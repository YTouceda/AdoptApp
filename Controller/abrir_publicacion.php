<?php 



class Abrir_Publicacion extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mascota = [];

    }
    
    
    function Render(){
        if(!isset($_GET['mascota'])){
            $this->view->render('errores/index');
        }
        else{
            $mascota = $_GET['mascota'];
        }
        $datos = $this->model->getDatos($mascota);
        if($datos){
            $this->view->mascota = $datos;
            $this->view->render('abrir_publicacion/index');
        }else{
            echo 'No se encontro la publicacion.';
        }
    }
    
}


?>