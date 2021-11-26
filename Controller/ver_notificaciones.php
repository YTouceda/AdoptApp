<?php 

class ver_notificaciones extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->notificaciones = [];
        $this->view->usuario=new Usuario();
    }
    
    function Render(){
        $this->view->usuario->setUsuario($this->userSession->getCurrentUsuario());
        $this->view->render('ver_notificaciones/index');
    }
}