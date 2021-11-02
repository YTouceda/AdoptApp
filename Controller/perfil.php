<?php

Class Perfil extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->user=new user();
    }
    function Render(){
        if(isset($_SESSION['id'])){
            $this->view->user->setUser($this->userSession->getCurrentUser());
        }
        $this->view->render('perfil/index');
    }
}

?>