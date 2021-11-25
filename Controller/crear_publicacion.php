<?php 
include_once 'Clases/publicacion.php';
class Crear_Publicacion extends Controller{
    function __construct(){
        parent::__construct();
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $this->view->usuario = new Usuario();
        
    }
    function render(){
        $this->view->usuario->setUsuario($this->userSession->getCurrentUsuario());
        $this->view->render('crear_publicacion/index');
    }
    function registrarMascota(){
        if($this->view->usuario->puede('Crear publicacion') && isset($_POST['sexo']) && isset($_POST['edad']) && isset($_POST['tamanio'])  && isset($_POST['especie'])  && isset($_POST['nombre'])  && isset($_POST['descripcion'])  && isset($_POST['estado']) && isset($_POST['provincia']) && isset($_POST['telefono']) && isset($_POST['localidad'])){
            
        
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false){
            $file = $_FILES['foto'];
            $name = $file['name'];
            $ruta_provisional = $file['tmp_name'];
            $carpeta ="Public/public_media/";
            $dataTime = date("Y-m-d H:i:s");
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
                $objPublicacion->setId_usuario( $_SESSION['id']);
                $objPublicacion->setEstado( $_POST['estado']);
                $objPublicacion->setProvincia( $_POST['provincia']);
                $objPublicacion->setNum_contacto_publicacion( $_POST['telefono']);
                $objPublicacion->setFecha_alta_publicacion( $dataTime);
                $objPublicacion->setLocalidad( $_POST['localidad']);
                
                if($this->model->insert($objPublicacion)){
                    move_uploaded_file($ruta_provisional, $src);
                    header('Location:' . constant('URL'));
                    
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
   
}
    
?>