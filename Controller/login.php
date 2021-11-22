<?php

include_once 'Clases/usuario.php';

Class Login extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->usuario = new Usuario();

    }

    function Render(){
        if(isset($_POST['login_id'])){
            $id_user = $_POST['login_id'];
            if($this->model->userExists($id_user)){
                $this->userSession->setCurrentUsuario($id_user);
                header('Location:' . getenv('HTTP_REFERER'));
            }else{
                $this->view->usuario->setId($_POST['login_id']);
                $this->view->usuario->setNombre($_POST['login_nombre']);
                $this->view->usuario->setNumero($_POST['login_numero']);
                $this->view->usuario->setEmail($_POST['login_email']);
                $this->view->usuario->setFoto($_POST['login_foto']);
                $this->view->render('login/index');
                var_dump ($_POST['login_nombre']);
                return true;
            }                                  
            header('Location:' . getenv('HTTP_REFERER'));
        }else{
            header('Location:' . getenv('HTTP_REFERER'));
        }
    }

    function Guardar_datos(){
        if(isset($_POST['Id']) && isset($_POST['Nombre']) && isset($_POST['Numero']) && isset($_POST['Email']) && isset($_POST['foto'])){
            $id_user = $_POST['Id'];
            $this->view->usuario->setId($id_user);
            $this->view->usuario->setPermisos(1);
            $this->view->usuario->setNombre($_POST['Nombre']);
            $this->view->usuario->setNumero($_POST['Numero']);
            $this->view->usuario->setEmail($_POST['Email']);
            $this->view->usuario->setFoto($_POST['foto']);
            if($this->model->insertUsuario(['ID_USUARIO' => $id_user, 'ID_PERMISO' => $this->view->usuario->getPermisos(), 'NOMBRE_USUARIO' => $this->view->usuario->getNombre(), 'NUM_CONTACTO_USUARIO' => $this->view->usuario->getNumero() ,'EMAIL_USUARIO' => $this->view->usuario->getEmail(),'FOTO_PERFIL' => $this->view->usuario->getFoto()])){
                header('Location: '.constant('URL').'perfil');
            }
            else{
                echo "No se pudo iniciar sesión.";
            }
            $this->userSession->setCurrentUsuario($id_user);
        }
    }

}

?>