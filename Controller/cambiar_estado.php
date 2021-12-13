<?php 



class cambiar_estado extends Controller{
    function __construct(){
        parent::__construct();
    }
    
    
    function Render(){
        $this->model->cambiar_estado(); 
        $this->model->desbanear_usuarios();
    }
}


?>