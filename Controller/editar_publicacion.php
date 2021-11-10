<?php

Class editar_publicacion extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->user=new Usuario();
        $this->view->mensaje = "";
        $this->view->mascota = [];
    }
    function Render(){
        if(!isset($_GET['publicacion'])){
            $this->view->render('errores/index');
        }else{
            $publicacion = $_GET['publicacion'];
        }
        $objPublicacion = $this->model->get($publicacion);
        if($objPublicacion){
            $this->view->publicacion = $objPublicacion;
            $this->view->mascota = $objPublicacion->getMascota();
            $this->view->render('editar_publicacion/index');
        }else{
            echo 'No se encontro la publicacion.';
        }
    }
    

    function editarMascota(){
        $this->view->render('editar_publicacion/index');
        if(isset($_SESSION['id']) && isset($_POST['sexo']) && isset($_POST['edad']) && isset($_POST['tamanio'])  && isset($_POST['especie'])  && isset($_POST['nombre'])  && isset($_POST['descripcion'])  && isset($_POST['estado']) && isset($_POST['provincia']) && isset($_POST['telefono']) && isset($_POST['localidad'])){
            
        
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false){
            $file = $_FILES['foto'];
            $name = $file['name'];
            $ruta_provisional = $file['tmp_name'];
            $carpeta ="Public/public_media/";
            //Randomiza el nombre de la imagen
            $logitudPass= 10;
            $newNameFoto= substr( md5(microtime()), 1, $logitudPass);
            $explode= explode('.', $name);
            $extension_foto= array_pop($explode);
            $nuevoNameFoto= $newNameFoto.'.'.$extension_foto;
            $src = $carpeta.$nuevoNameFoto;
            if(isset($_POST['nombre'])){
                $objMascota= new Mascota();
                $objMascota->setSexo_mascota($_POST['sexo']);
                $objMascota->setEdad_mascota( $_POST['edad']);
                $objMascota->setTamanio_mascota ($_POST['tamanio']) ;
                $objMascota->setEspecie_mascota  ($_POST['especie']) ;
                $objMascota->setNombre_mascota  ($_POST['nombre']) ;
                $objMascota->setDescripcion_mascota ($_POST['descripcion']) ;
                $objMascota->setFotos_mascota ($nuevoNameFoto);
                
                $objPublicacion= new Publicacion();
                $objPublicacion->setMascota($objMascota);
                $objPublicacion->setEstado( $_POST['estado']);
                $objPublicacion->setProvincia( $_POST['provincia']);
                $objPublicacion->setNum_contacto_publicacion( $_POST['telefono']);
                $objPublicacion->setLocalidad( $_POST['localidad']);
                
                if($this->model->update($objPublicacion)){
                    move_uploaded_file($ruta_provisional, $src);
                    //header('Location:' . constant('URL'));
                    
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
        }else{
            echo "Error, publicación no guardada. Debe seleccionar los datos de su ubicación.";
        }
    }

    






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
    //     header('Location: ../mi_publicacion?publicacion='.$this->view->mascota->id_mascota);
    // }

}

?>