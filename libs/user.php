<?php

include_once 'db.php';

class User extends DB{

    private $id_usuario;
    private $permiso_sesion;
    private $NOMBRE_USUARIO;
    private $NUM_CONTACTO_USUARIO;
    private $EMAIL_USUARIO;
    private $FOTO_USUARIO;

    public function userExists($id){
        
        $query = $this->connect()->prepare('SELECT * FROM adoptapp.usuario WHERE ID_USUARIO = :id ');
        $query->execute(['id' => $id]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($id){
        
        $query = $this->connect()->prepare('SELECT * FROM adoptapp.usuario WHERE ID_USUARIO = :id');
        $query->execute(['id' => $id]);

        foreach ($query as $currentUser) {
            $this->id_usuario = $currentUser['ID_USUARIO'];
            $this->permiso_sesion = $currentUser['ID_PERMISO'];
        }

        $query = $this->connect()->prepare('SELECT * FROM adoptapp.datos_personales WHERE ID_USUARIO = :id');
        $query->execute(['id' => $id]);

        foreach ($query as $currentUser) {
            $this->NOMBRE_USUARIO = $currentUser['NOMBRE_USUARIO'];
            $this->NUM_CONTACTO_USUARIO = $currentUser['NUM_CONTACTO_USUARIO'];
            $this->EMAIL_USUARIO = $currentUser['EMAIL_USUARIO'];
            $this->FOTO_USUARIO = $currentUser['FOTO_USUARIO'];

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