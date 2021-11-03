<?php

Class editar_publicacion extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->user=new user();
        $this->view->mensaje = "";
        $this->view->mascota = [];
    }
    function Render(){
        if(!isset($_GET['mascota'])){
            $this->view->render('errores/index');
        }else{
            $mascota = $_GET['mascota'];
        }
        $datos = $this->model->get($mascota);
        if($datos){
            $this->view->mascota = $datos;
            $this->view->render('editar_publicacion/index');
        }else{
            echo 'No se encontro la publicacion.';
        }
    }


    // function Guardar_cambios(){
    //     $this->view->render('editar_publicacion/index');
    //     $check = getimagesize($_FILES["foto"]["tmp_name"]);
    //     if($check !== false){
    //         $file = $_FILES['foto'];
    //         $name = $file['name'];
    //         $ruta_provisional = $file['tmp_name'];
    //         $carpeta ="Public/public_media/";
    //         $src = $carpeta.$name;
    //         move_uploaded_file($ruta_provisional, $src);
    //         $dataTime = date("Y-m-d H:i:s");
    //         if(isset($_POST['nombre']) && isset($_POST['sexo']) && isset($_POST['edad']) && isset($_POST['tamanio']) && isset($_POST['descripcion']) && isset($_POST['estado']) && isset($_POST['localidad']) && isset($_POST['tipo']) && isset($_POST['telefono'])){
    //             $usuario = $this->user->getId();
    //             $nombre  = $_POST['nombre'];
    //             $sexo = $_POST['sexo'];
    //             $edad = $_POST['edad'];
    //             $tamanio = $_POST['tamanio'];
    //             $descripcion = $_POST['descripcion'];
    //             $estado   = $_POST['estado'];
    //             $localidad   = $_POST['localidad'];
    //             $tipo  = $_POST['tipo'];
    //             $foto  = $name;
    //             $telefono  = $_POST['telefono'];
    //             $fecha_publicado  = $dataTime;
    
    //             if($this->model->insert([
    //            'usuario'=>$usuario,
    //            'nombre'=>$nombre,
    //            'sexo'=>$sexo,
    //            'edad'=>$edad,
    //            'tamanio'=>$tamanio,
    //            'descripcion'=>$descripcion,
    //            'estado'=>$estado,
    //            'localidad'=>$localidad,
    //            'tipo'=>$tipo,
    //            'telefono'=>$telefono,
    //            'fecha_publicado'=>$fecha_publicado,
    //            'foto'=>$foto,])){
    //                 //$this->view->mensaje = "Se guardo correctamente los cambios.";
    //             }else {
    //                 //$this->view->mensaje = "No se pudo guardar correctamente la publicacion.";
    //             }
                
    //         }else{
    //             echo "Debe ingresar toda la informacion de la mascota";
    //         }
    //     }else{
    //         echo "Debe ingresar la foto de la mascota";
    //     }
    // }
    // function Guardar_cambios(){
    //     if(isset($_POST['Id']) && isset($_POST['Nombre']) && isset($_POST['Email']) && isset($_POST['Numero'])){
    //         $ID_USUARIO = $_POST['Id']; 
    //         $NOMBRE_USUARIO = $_POST['Nombre'];
    //         $NUM_CONTACTO_USUARIO = $_POST['Numero'];
    //         $EMAIL_USUARIO = $_POST['Email'];
    //         // if(ValidarDatos(['ID_USUARIO' => $ID_USUARIO, 'NOMBRE_USUARIO' => $NOMBRE_USUARIO,'NUM_CONTACTO_USUARIO' => $NUM_CONTACTO_USUARIO,'EMAIL_USUARIO' => $EMAIL_USUARIO])){
    //         $mensaje = $this->model->insert(['ID_USUARIO' => $ID_USUARIO, 'NOMBRE_USUARIO' => $NOMBRE_USUARIO,'NUM_CONTACTO_USUARIO' => $NUM_CONTACTO_USUARIO,'EMAIL_USUARIO' => $EMAIL_USUARIO]);
    //         // }else {
    //         //     $mensaje = "Los datos ingresados no son validos";
    //         // }
    //     }
    //     else{
    //         // header('Location:' . getenv('HTTP_REFERER'));
    //         echo "<br>Debe ingresar todos los campos obligatorios";
    //     }
    //     if(isset($_POST['Id']) && isset($_FILES['images_nueva'])){
    //         $ID_USUARIO = $_POST['Id'];
    //         $FOTO_USUARIO = $_FILES['images_nueva'];
    //         $mensaje = $this->model->insertFoto(['ID_USUARIO' => $ID_USUARIO , 'FOTO_USUARIO' => $FOTO_USUARIO]);
    //     }
    //     $this->view->mensaje = $mensaje;
    //     header('Location: ../mi_publicacion?mascota='.$this->view->mascota->id_mascota);
    // }

}

?>