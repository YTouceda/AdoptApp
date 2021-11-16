<?php 

class Datos_Personales{
    private $id_usuario;
    private $nombre_usuario;
    private $num_contacto_usuario;
    private $email_usuario;
    private $foto_perfil;
    
    function getId_usuario(){
        return $this->id_usuario;
    }
    
    function setId_usuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
    
    function getNombre_usuario(){
        return $this->nombre_usuario;
    }
    
    function setNombre_usuario($nombre_usuario){
        $this->nombre_usuario = $nombre_usuario;
    }
    
    function getNum_contacto_usuario(){
        return $this->num_contacto_usuario;
    }
    
    function setNum_contacto_usuario($num_contacto_usuario){
        $this->num_contacto_usuario = $num_contacto_usuario;
    }
    
    function getEmail_usuario(){
        return $this->email_usuario;
    }
    
    function setEmail_usuario($email_usuario){
        $this->email_usuario = $email_usuario;
    }
    
    function getFoto_perfil(){
        return $this->foto_perfil;
    }
    
    function setFoto_perfil($foto_perfil){
        $this->foto_perfil = $foto_perfil;
    }
    
}


?>