<?php 

class Crear_Publicacion extends Controller{
    function __construct(){
        parent::__construct();
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $this->user=new user();
    }

    function render(){
        $this->view->render('crear_publicacion/index');
    }


    function registrarMascota(){
        $this->view->render('crear_publicacion/index');
        if(isset($_SESSION['id'])){
            $this->user->setUser($this->userSession->getCurrentUser());
        }
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false){
            $file = $_FILES['foto'];
            $name = $file['name'];
            $ruta_provisional = $file['tmp_name'];
            $carpeta ="Public/public_media/";
            $src = $carpeta.$name;
            move_uploaded_file($ruta_provisional, $src);
            $dataTime = date("Y-m-d H:i:s");
            if(isset($_POST['nombre'])){
                $usuario = $this->user->getId();
                $nombre  = $_POST['nombre'];
                $sexo = $_POST['sexo'];
                $edad = $_POST['edad'];
                $tamanio = $_POST['tamanio'];
                $descripcion = $_POST['descripcion'];
                $estado   = $_POST['estado'];
                $localidad   = $_POST['localidad'];
                $tipo  = $_POST['tipo'];
                $foto  = $name;
                $telefono  = $_POST['telefono'];
                $fecha_publicado  = $dataTime;
    
                if($this->model->insert([
               'usuario'=>$usuario,
               'nombre'=>$nombre,
               'sexo'=>$sexo,
               'edad'=>$edad,
               'tamanio'=>$tamanio,
               'descripcion'=>$descripcion,
               'estado'=>$estado,
               'localidad'=>$localidad,
               'tipo'=>$tipo,
               'telefono'=>$telefono,
               'fecha_publicado'=>$fecha_publicado,
               'foto'=>$foto,])){
                    //$this->view->mensaje = "Se guardaron correctamente los cambios.";
                }else {
                    //$this->view->mensaje = "No se pudo guardar correctamente la publicacion.";
                }
                
            }else{
                echo "Debe ingresar toda la informacion de la mascota";
            }
        }else{
            echo "Debe ingresar la foto de la mascota";
        }
    }

   

}


    


?>