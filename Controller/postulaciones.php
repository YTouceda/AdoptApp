<?php
Class Postulaciones extends Controller{
    function __construct(){
        parent::__construct();
    }
    function Render(){
        $this->view->render('postulacion/index');
    }
}
?>