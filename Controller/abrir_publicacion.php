<?php 

include_once 'Clases/denuncia.php';

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
            $this->view->estado_denuncia=$this->validar();
            $this->view->render('abrir_publicacion/index');
        }else{
            // var_dump($publicacion);
            echo 'No se encontro la publicacion.';
    }
}
    function eliminar(){
        if(isset($_GET['publicacion'])){
            //var_dump($_GET['publicacion']);
            $this->model->eliminar($_GET['publicacion']);
        }
        
        header('Location:' . constant('URL'));
    }

    function denunciar(){
        if(isset($_POST['ID_PUBLICACION']) && isset($_POST['DESCRIPCION']) && isset($_POST['ID_TIPO_DENUNCIA']) && isset($_SESSION['id'])){
        $objDenuncia=new Denuncia();
        $objDenuncia->setId_publicacion($_POST['ID_PUBLICACION']);
        $objDenuncia->setDescripcion($_POST['DESCRIPCION']);
        $objDenuncia->setId_tipo_denuncia($_POST['ID_TIPO_DENUNCIA']);
        $objDenuncia->setId_usuario_denunciante($_SESSION['id']);
            $this->model->denunciar($objDenuncia);

        }else{
            echo "Error, faltan datos pillín :)";
        }
        header('Location:' . constant('URL'));//const url
    }
    function validar(){
        if(isset($_GET['publicacion'])&& isset($_SESSION['id'])){
            $objDenuncia=new Denuncia();
            $objDenuncia->setId_publicacion($_GET['publicacion']);
            $objDenuncia->setId_usuario_denunciante($_SESSION['id']);
            $estado_denuncia=$this->model->validarDenuncia($objDenuncia);
            return $estado_denuncia;
        }


    }
}


?>