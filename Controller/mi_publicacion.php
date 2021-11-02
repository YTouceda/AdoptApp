<?php

Class mi_publicacion extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->user=new user();
        $this->view->postulaciones = [];
    }

    function Render(){
        if(!isset($_GET['mascota'])){
            $this->view->render('errores/index');
        }else{
            $mascota = $_GET['mascota'];
        }
        $post = $this->model->getPostulaciones($mascota);
        if($post){
            $this->view->postulaciones = $post;
        }else{
            echo 'No se encontraron postulaciones.';
        }
        $datos = $this->model->get($mascota);
        if($datos){
            $this->view->mascota = $datos;
            $this->view->render('mi_publicacion/index');
        }else{
            echo 'No se encontro la publicacion.';
        }
    }

    function elegir_postulante(){
        if(isset($_POST['postulante'])){
            if($this->model->insertNuevaAdopcion($_POST['postulante'])){
                $this->mensaje = "Sealmaceno correctamente";
            }else{
                $this->mensaje = "No se pudo almacenar la adopcion.";
            }
        }else{
            $this->mensaje = "No se eligio ningun postulante.";
        }
    }

}

?>