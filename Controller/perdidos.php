<?php

Class Perdidos extends Controller{
    function __construct(){
        parent::__construct();
    }
    
    function Render(){
        if(!isset($_GET['seccion'])){
            $seccion = 'perdidos';
        }else{
            $seccion = $_GET['seccion'];
        }
        $this->view->seccion = $seccion;
        if(!isset($_GET['pagina'])){
            $pagina = 1;
        }else{
            $pagina = $_GET['pagina'];
        }
        $datos = $this->model->get($pagina);
        if(!empty($datos['items'])){
            $this->view->mascotas = $datos['items'];
            $this->view->total_paginas = $datos['total'];
            $this->view->pagina = $pagina;
            $this->view->render('perdidos/index');
        }else{
            
            $this->view->render('perdidos/index');
        }
    }


    function perdidos(){
        if(!isset($_GET['seccion'])){
            $seccion = 'perdidos';
        }else{
            $seccion = $_GET['seccion'];
        }
        $this->view->seccion = $seccion;
        if(!isset($_GET['pagina'])){
            $pagina = 1;
        }else{
            $pagina = $_GET['pagina'];
        }
        $datos = $this->model->get($pagina);
        if($datos['items']){
            $this->view->mascotas = $datos['items'];
            $this->view->total_paginas = $datos['total'];
            $this->view->pagina = $pagina;
            $this->view->render('perdidos/index');
        }else{
            
            $this->view->render('perdidos/index');
        }
    }


    function encontrados(){
        if(!isset($_GET['seccion'])){
            $seccion = 'perdidos';
        }else{
            $seccion = $_GET['seccion'];
        }
        $this->view->seccion = $seccion;
        if(!isset($_GET['pagina'])){
            $pagina = 1;
        }else{
            $pagina = $_GET['pagina'];
        }
        $datos = $this->model->get($pagina);
        if($datos['items']){
            $this->view->mascotas = $datos['items'];
            $this->view->total_paginas = $datos['total'];
            $this->view->pagina = $pagina;
            $this->view->render('perdidos/index');
        }else{
            
            $this->view->render('perdidos/index');
        }
    }
}

?>