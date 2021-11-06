<?php

include_once 'Clases/usuario.php';
include_once 'Libs/model.php';

class loginModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function insertUsuario($datos){
        //insertar datos en la base de datos
        try {
            $query = $this->db->connect();
            $query->beginTransaction();            
            $query->exec("INSERT INTO USUARIO (ID_USUARIO,ID_PERMISO)VALUES(".$datos['ID_USUARIO'].", ".$datos['ID_PERMISO']." );");
            $query->exec("INSERT INTO DATOS_PERSONALES (`ID_USUARIO` , `NOMBRE_USUARIO` , `NUM_CONTACTO_USUARIO` , `EMAIL_USUARIO` , `FOTO_PERFIL`)VALUES(".$datos['ID_USUARIO']." , '".$datos['NOMBRE_USUARIO']."' , '".$datos['NUM_CONTACTO_USUARIO']."' , '".$datos['EMAIL_USUARIO']."' , '".$datos['FOTO_PERFIL']."');");
            $query->commit();
            return true;
        }catch(PDOException $exc) {

            $query->rollback();
            echo "Error: " . $exc->getMessage();
            return false;

        }           
    }

    public function userExists($id){
        $query = $this->db->connect()->prepare("SELECT ID_USUARIO FROM USUARIO WHERE ID_USUARIO = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUsuario($id){
        $usuario = new Usuario();

        $query = $this->db->connect()->prepare("SELECT * FROM USUARIO WHERE ID_USUARIO = :id");
        $query->bindParam(':id', $id);
        $query->execute();

        foreach ($query as $currentUsuario) {
            $usuario->setId($currentUsuario['ID_USUARIO']);
            $usuario->setPermisos($currentUsuario['ID_PERMISO']);
        }

        $query = $this->db->connect()->prepare("SELECT * FROM DATOS_PERSONALES WHERE ID_USUARIO = :id");
        $query->bindParam(':id', $id);
        $query->execute();

        foreach ($query as $currentUsuario) {
            $usuario->setNombre($currentUsuario['NOMBRE_USUARIO']);
            $usuario->setNumero($currentUsuario['NUM_CONTACTO_USUARIO']);
            $usuario->setEmail($currentUsuario['EMAIL_USUARIO']);
            $usuario->setFoto($currentUsuario['FOTO_PERFIL']);
        }

        return $usuario;

    }

}

?>