<?php

Class Header extends Controller{
    function __construct(){
        parent::__construct();
    }
    
    function Render(){
        $this->view->render('header/index');
    }

    function login(){
        if(isset($_SESSION['id'])){
            $this->user->setUser($this->userSession->getCurrentUser());
            header('Location:' . getenv('HTTP_REFERER'));
        }else if(isset($_POST['id'])){
            $id_user = $_POST['id'];
            if($this->user->userExists($id_user)){
                $this->userSession->setCurrentUser($id_user);
                $this->user->setUser($id_user);
                header('Location:' . getenv('HTTP_REFERER'));
            }else{
                if(isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['id'])){
                    $ID_USUARIO = ($_POST['id']);
                    $NOMBRE_USUARIO = ($_POST['nombre']);
                    $EMAIL_USUARIO = ($_POST['email']);
                    $FOTO_USUARIO = ($_POST['foto']);
                    if($this->model->insertUsuario(['ID_USUARIO' => $ID_USUARIO,'NOMBRE_USUARIO' => $NOMBRE_USUARIO,'EMAIL_USUARIO' => $EMAIL_USUARIO,'FOTO_USUARIO' => $FOTO_USUARIO])){
                        echo "Se inicio sesión correctamente";
                    }
                    $this->userSession->setCurrentUser($id_user);
                    $this->user->setUser($this->userSession->getCurrentUser());
                }
            }                                  
            header('Location:' . getenv('HTTP_REFERER'));
        }else{
            header('Location:' . getenv('HTTP_REFERER'));
        }
    }

}

?>