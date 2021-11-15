<?php 



class abrir_publicacion extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->user=new Usuario();
        $this->view->publicacion = [];
        $this->view->mascota = [];

    }
    
    
    function Render(){
        if(!isset($_GET['publicacion'])){
            $this->view->render('errores/index');
        }else{
            $publicacion = $_GET['publicacion'];
        }
        $objPublicacion = $this->model->get($publicacion);
        // var_dump($objPublicacion);
        if($objPublicacion){
            $this->view->publicacion = $objPublicacion;
            $this->view->mascota = $objPublicacion->getMascota();
            $this->view->render('abrir_publicacion/index');
        }else{
            // var_dump($publicacion);
            echo 'No se encontro la publicacion.';
    }
}
}


?>