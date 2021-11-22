<?php
Class Footer extends Controller{
    function __construct(){
        parent::__construct();
    }
    function Render(){
        $this->view->render('footer/index');
    }
}
?>