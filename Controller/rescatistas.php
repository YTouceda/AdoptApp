<?php
class rescatistas extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->usuario=new Usuario();
    }
    function Render(){
        $this->view->usuario->setUsuario($this->userSession->getCurrentUsuario());
        $this->view->render('rescatistas/index');
    }
}
?>