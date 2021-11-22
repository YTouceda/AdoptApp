<?php
Class Mis_publicaciones extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->publicaciones = [];
        $this->view->user=new Usuario();
    }
    
    function Render(){
        if(isset($_SESSION['id'])){
            $this->view->user->setUsuario($this->userSession->getCurrentUsuario());
        }
        if(!isset($_GET['pagina'])){
            $pagina = 1;
        }else{
            $pagina = $_GET['pagina'];
        }
        $datos = $this->model->get($this->view->user->getId(),$pagina);
        // die(var_dump($datos));
        if($datos){
            $this->view->publicaciones = $datos['publicaciones'];
            $this->view->total_paginas = $datos['total'];
            $this->view->pagina = $pagina;
            $this->view->render('mis_publicaciones/index');
        }else{
            $this->view->render('mis_publicaciones/index');
        }
    }
    
}
?>