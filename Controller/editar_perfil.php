<?php
Class Editar_perfil extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->usuario=new Usuario();
        $this->view->mensaje = "";
    }
    function Render(){
        $this->view->usuario->setUsuario($this->userSession->getCurrentUsuario());
        $this->view->render('editar_perfil/index');
    }
    
    function Guardar_cambios(){
        if(isset($_POST['Id']) && isset($_POST['Nombre']) && isset($_POST['Email']) && isset($_POST['Numero'])){
            $ID_USUARIO = $_POST['Id']; 
            $NOMBRE_USUARIO = $_POST['Nombre'];
            $NUM_CONTACTO_USUARIO = $_POST['Numero'];
            $EMAIL_USUARIO = $_POST['Email'];
            // if(ValidarDatos(['ID_USUARIO' => $ID_USUARIO, 'NOMBRE_USUARIO' => $NOMBRE_USUARIO,'NUM_CONTACTO_USUARIO' => $NUM_CONTACTO_USUARIO,'EMAIL_USUARIO' => $EMAIL_USUARIO])){
            $mensaje = $this->model->insert(['ID_USUARIO' => $ID_USUARIO, 'NOMBRE_USUARIO' => $NOMBRE_USUARIO,'NUM_CONTACTO_USUARIO' => $NUM_CONTACTO_USUARIO,'EMAIL_USUARIO' => $EMAIL_USUARIO]);
            // }else {
            //     $mensaje = "Los datos ingresados no son validos";
            // }
        }
        else{
            // header('Location:' . getenv('HTTP_REFERER'));
            echo "<br>Debe ingresar todos los campos obligatorios";
        }
        if(isset($_POST['Id']) && isset($_FILES['images_nueva'])){
            $ID_USUARIO = $_POST['Id'];
            $FOTO_USUARIO = $_FILES['images_nueva'];
            $mensaje = $this->model->insertFoto(['ID_USUARIO' => $ID_USUARIO , 'FOTO_USUARIO' => $FOTO_USUARIO]);
        }
        $this->view->mensaje = $mensaje;
        header('Location: ../perfil');
    }
}
?>