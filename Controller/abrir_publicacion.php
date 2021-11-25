<?php 
include_once 'Clases/denuncia.php';
class abrir_publicacion extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->publicacion = [];
        $this->view->mascota = [];
        $this->view->postulaciones = [];
        $this->view->usuario=new Usuario();
        $this->view->estado_boton = "";
    }
    
    
    function Render(){
        $this->view->usuario->setUsuario($this->userSession->getCurrentUsuario());
        if(!isset($_GET['publicacion'])){
            $this->view->render('errores/index');
        }else{
            $publicacion = $_GET['publicacion'];
        }
        $post = $this->model->getPostulaciones($publicacion);
        if($post){
            $this->view->postulaciones = $post;
        }
        $this->view->estado_post=$this->validarPostulacion();
        $objPublicacion = $this->model->get($publicacion);
        // var_dump($objPublicacion);
        if($objPublicacion){
            $this->view->publicacion = $objPublicacion;
            if($this->view->publicacion->getEstado() =='En adopción'){
                $this->view->estado_boton = "Postularse para adoptar";
            }
            else if($this->view->publicacion->getEstado() =='Perdido'){
                $this->view->estado_boton = "Encontre tu mascota";
            }
            else if($this->view->publicacion->getEstado() =='Encontrado'){
                $this->view->estado_boton = "Soy el dueño";
            }
            $this->view->mascota = $objPublicacion->getMascota();
            $this->view->estado_denuncia=$this->validar();
            $this->view->render('abrir_publicacion/index');
        }else{
            //var_dump($objPublicacion);
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
        if(isset($_POST['ID_PUBLICACION']) && isset($_POST['DESCRIPCION']) && isset($_POST['ID_TIPO_DENUNCIA']) && $this->view->usuario->puede('Denunciar')){
        $objDenuncia=new Denuncia();
        $objDenuncia->setId_publicacion($_POST['ID_PUBLICACION']);
        $objDenuncia->setDescripcion($_POST['DESCRIPCION']);
        $objDenuncia->setId_tipo_denuncia($_POST['ID_TIPO_DENUNCIA']);
        $objDenuncia->setId_usuario_denunciante($_SESSION['id']);
        $this->model->denunciar($objDenuncia);
        }else{
            echo "Error, faltan datos";
        }
        header('Location:' . constant('URL'));//const url
    }
    function validar(){
        if(isset($_GET['publicacion'])&& $_SESSION['id']!=0){
            $objDenuncia=new Denuncia();
            $objDenuncia->setId_publicacion($_GET['publicacion']);
            $objDenuncia->setId_usuario_denunciante($_SESSION['id']);
            $estado_denuncia=$this->model->validarDenuncia($objDenuncia);
            return $estado_denuncia;
        }
    }
    function postularse(){
        if(isset($_GET['publicacion'])){
            $this->model->setPostulacion($_GET['publicacion']);
        }
        header('Location:' . getenv('HTTP_REFERER'));
    }
    function cancelarPostulacion(){
        $this->model->cancelarPostulacion($_SESSION['id']);
        
        header('Location:' . getenv('HTTP_REFERER'));
    }
    function validarPostulacion(){
        if(empty($this->view->postulaciones)){
            return true;
        }else{
            $resultado_post=true;
            foreach ($this->view->postulaciones as $postulacion){
                if($postulacion['USUARIO_POSTULADO']->getId()==$_SESSION['id']){
                    $resultado_post=false;
                }
            }
            return $resultado_post;
        }
    }
    function eliminar_postulacion(){
        if(isset($_GET['id_postulacion'])){
            if($this->model->eliminarPostulacion($_GET['id_postulacion'])){
                $this->mensaje = "Se elimino correctamente";
                header('Location:' . getenv('HTTP_REFERER'));
            }else{
                $this->mensaje = "No se pudo eliminar la postulacion.";
                header('Location:' . getenv('HTTP_REFERER'));
            }
        }else{
            $this->mensaje = "No se eligio ningun postulante.";
            header('Location:' . getenv('HTTP_REFERER'));
        }
    }
    function aceptar_postulacion(){
        if(isset($_GET['id_postulacion'])){
        if($this->model->getAdopcion($_GET['id_postulacion'])){
            $this->mensaje = "Se almaceno correctamente";
            header('Location:' . getenv('HTTP_REFERER'));
        }else{
            $this->mensaje = "No se pudo almacenar la adopcion.";
            header('Location:' . getenv('HTTP_REFERER'));
        }
        }else{
            $this->mensaje = "No se eligio ningun postulante.";
            header('Location:' . getenv('HTTP_REFERER'));
        }
    }
}
?>