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
        $this->view->render('editar_publicacion/index'); //aca va mi publicacion
        //if(isset($_SESSION['id']) && isset($_POST['sexo']) && isset($_POST['edad']) && isset($_POST['tamanio'])  && isset($_POST['especie'])  && isset($_POST['nombre'])  && isset($_POST['descripcion'])  && isset($_POST['estado']) && isset($_POST['provincia']) && isset($_POST['telefono']) && isset($_POST['localidad'])){
            
            
            $check = getimagesize($_FILES["foto"]["tmp_name"]);
            if($check !== false){
            
            $file = $_FILES['foto'];
            var_dump($file);
            $filecmp=$_FILES['fotocmp'];
            var_dump($filecmp);

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
                $objMascota->setTamanio_mascota ($_POST['tamanio']);
                $objMascota->setEspecie_mascota  ($_POST['especie']);
                $objMascota->setNombre_mascota  ($_POST['nombre']);
                $objMascota->setDescripcion_mascota ($_POST['descripcion']) ;
                $objMascota->setFotos_mascota ($nuevoNameFoto);
                $objMascota->setId_mascota($_POST['id_mascota']);
                
                $objPublicacion= new Publicacion();
                $objPublicacion->setMascota($objMascota);
                $objPublicacion->setEstado( $_POST['estado']);
                $objPublicacion->setProvincia( $_POST['provincia']);
                $objPublicacion->setNum_contacto_publicacion( $_POST['telefono']);
                $objPublicacion->setLocalidad( $_POST['localidad']);
                $objPublicacion->setId_publicacion($_GET['publicacion']);
                
                if($this->model->update($objPublicacion)){
                    if($file!=$filecmp)
                    move_uploaded_file($ruta_provisional, $src);
                    //header('Location:' . constant('URL').'abrir_publicacion?publicacion='.$_GET['publicacion']);
                    
                    
                    //$this->view->mensaje = "Se guardaron correctamente los cambios.";
                }else {
                    echo "No se pudo guardar correctamente la publicacion.";
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