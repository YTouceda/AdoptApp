<?php

Class mi_publicacion extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->user=new Usuario();
        $this->view->postulaciones = [];
    }

    function Render(){
        if(!isset($_GET['publicacion'])){
            $this->view->render('errores/index');
        }else{
            $publicacion = $_GET['publicacion'];
        }
        $post = $this->model->getPostulaciones($publicacion);
        if($post){
            $this->view->postulaciones = $post;
        }else{
            echo 'No se encontraron postulaciones.';
        }
        $datos = $this->model->get($publicacion);
        if($datos){
            $this->view->publicacion = $datos;
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