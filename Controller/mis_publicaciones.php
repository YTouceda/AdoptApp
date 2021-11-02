<?php

Class Mis_publicaciones extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mascotas = [];
        $this->view->user=new user();

    }
    
    function Render(){
        if(isset($_SESSION['id'])){
            $this->view->user->setUser($this->userSession->getCurrentUser());
        }
        if(!isset($_GET['pagina'])){
            $pagina = 1;
        }else{
            $pagina = $_GET['pagina'];
        }
        $datos = $this->model->get($this->view->user->getId(),$pagina);
        if($datos['items']){
            $this->view->mascotas = $datos['items'];
            $this->view->total_paginas = $datos['total'];
            $this->view->pagina = $pagina;
            $this->view->render('mis_publicaciones/index');
        }else{
            $this->view->render('mis_publicaciones/index');
        }
    }
}

?>