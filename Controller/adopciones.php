<?php

Class Adopciones extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mascotas = [];

    }

    function Render(){
        if(!isset($_GET['pagina'])){
            $pagina = 1;
        }else{
            $pagina = $_GET['pagina'];
        }
        $datos = $this->model->get($pagina);
        if(!empty($datos['items'])){
            $this->view->publicacion = $datos['items'];
            $this->view->total_paginas = $datos['total'];
            $this->view->pagina = $pagina;
            $this->view->render('adopciones/index');
        }else{
            $this->view->render('adopciones/index');
        }
    }

}

?>