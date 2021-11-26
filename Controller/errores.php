<?php
class Errores extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->usuario=new Usuario();
        
        //$this->view->render('errores/index');
        
    }
    function Render(){
        $this->view->usuario->setUsuario($this->userSession->getCurrentUsuario());
        if(isset($_GET['mensaje'])){
            $this->view->mensaje = "Tu usuario se encuentra bloqueado.";
        }else{
            $this->view->mensaje = "Esta pagina no existe.";
        }
        $this->view->render('errores/index');
    }
    function Suspension(){
        $this->view->mensaje = "La publicación está suspendida.";
        $this->view->render('errores/index');
    }
}
?>