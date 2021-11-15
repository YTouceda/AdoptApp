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
        $post = $this->model->getPostulaciones($publicacion);
         if($post){
             $this->view->postulaciones = $post;
         }else{
             echo 'No se encontraron postulaciones.';
         }
        
        $objPublicacion = $this->model->get($publicacion);
        if($objPublicacion){
            $this->view->publicacion = $objPublicacion;
            $this->view->mascota = $objPublicacion->getMascota();
            $this->view->render('abrir_publicacion/index');
            
            
        }else{
                // var_dump($publicacion);
            echo 'No se encontro la publicacion.';
        }
       
        
        
    }
    function postularse(){
        if(isset($_GET['publicacion'])){
        $this->model->setPostulacion($_GET['publicacion']);
        }
        header('Location:' . getenv('HTTP_REFERER'));
    }
    function validar(){
        if(isset($_GET['publicacion'])&& isset($_SESSION['id'])){
            $objPostulante=new Postulante();
            $objPostulante->setId_publicacion($_GET['publicacion']);
            $objPostulante->setId_usuario_postulante($_SESSION['id']);
            $estado_postulante=$this->model->validarPostulante($objPostulante);
            return $estado_postulante;
        }


    }
}


?>