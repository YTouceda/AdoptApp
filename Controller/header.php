<?php
include_once 'Clases/usuario.php';
Class Header extends Controller{
    function __construct(){
        parent::__construct();
    }
    
    function Render(){
        $this->view->render('header/index');
        header('Location:' . getenv('HTTP_REFERER'));
    }
}
?>