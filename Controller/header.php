<?php
include_once 'Clases/usuario.php';
Class Header extends Controller{
    function __construct(){
        parent::__construct();
    }
    
    function Render(){
        $this->view->notificaciones = $this->model->get($_SESSION['id']);
        $this->view->render('header/index');
        if(isset($_SESSION['id'])){
            $this->usuario->setUsuario($this->userSession->getCurrentUsuario());
            header('Location:' . getenv('HTTP_REFERER'));
        }
        else{
            header('Location:' . getenv('HTTP_REFERER'));
        }
    }
}
?>