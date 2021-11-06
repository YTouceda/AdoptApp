<?php

include_once 'db.php';

class Usuario extends DB{

    private $id_usuario;
    private $permiso_sesion;
    private $NOMBRE_USUARIO;
    private $NUM_CONTACTO_USUARIO;
    private $EMAIL_USUARIO;
    private $FOTO_USUARIO;

    public function userExists($id){
        
        $query = $this->connect()->prepare('SELECT * FROM ADOPTAPP.USUARIO WHERE ID_USUARIO = :id ');
        $query->execute(['id' => $id]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUsuario($id){
        
        $query = $this->connect()->prepare('SELECT * FROM ADOPTAPP.USUARIO WHERE ID_USUARIO = :id');
        $query->execute(['id' => $id]);

        foreach ($query as $currentUsuario) {
            $this->id_usuario = $currentUsuario['ID_USUARIO'];
            $this->permiso_sesion = $currentUsuario['ID_PERMISO'];
        }

        $query = $this->connect()->prepare('SELECT * FROM ADOPTAPP.DATOS_PERSONALES WHERE ID_USUARIO = :id');
        $query->execute(['id' => $id]);

        foreach ($query as $currentUsuario) {
            $this->NOMBRE_USUARIO = $currentUsuario['NOMBRE_USUARIO'];
            $this->NUM_CONTACTO_USUARIO = $currentUsuario['NUM_CONTACTO_USUARIO'];
            $this->EMAIL_USUARIO = $currentUsuario['EMAIL_USUARIO'];
            $this->FOTO_USUARIO = $currentUsuario['FOTO_USUARIO'];

        }

    }

    public function getId(){
        return $this->id_usuario;
    }
    public function getPermisos(){
        return $this->permiso_sesion;
    }
    public function getNombre(){
        return $this->NOMBRE_USUARIO;
    }
    public function getNumero(){
        return $this->NUM_CONTACTO_USUARIO;
    }
    public function getEmail(){
        return $this->EMAIL_USUARIO;
    }
    public function getFoto(){
        return $this->FOTO_USUARIO;
    }
}

?>