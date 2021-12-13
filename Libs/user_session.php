<?php
class UsuarioSession{
    public function __construct(){
        session_start();
    }
    public function setCurrentUsuario($id){
        $_SESSION['id'] = $id;
    }
    public function getCurrentUsuario(){
        return $_SESSION['id'];
    }
    public function closeSession(){
        session_unset();
        session_destroy();
    }
}
?>