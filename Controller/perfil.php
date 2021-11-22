<?php

Class Perfil extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->user=new Usuario();
    }
    function Render(){

        if(isset($_SESSION['id'])){
            $this->view->user->setUsuario($this->userSession->getCurrentUsuario());
            
        }
        
        $this->view->render('perfil/index');
        // echo $this->userSession->getCurrentUsuario();
        
    }

}

?>