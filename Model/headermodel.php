<?php

class HeaderModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function insertUsuario($datos){
        //insertar datos en la base de datos
        try {
            
            $query = $this->db->connect();
            $query->beginTransaction();            
            $query->exec("INSERT INTO `adoptapp`.`usuario`(`ID_USUARIO`,`ID_PERMISO`)VALUES(".$datos['ID_USUARIO'].",1);");
            $query->exec("INSERT INTO `adoptapp`.`datos_personales`(`ID_USUARIO`,`NOMBRE_USUARIO`,`EMAIL_USUARIO`,`FOTO_USUARIO`)VALUES('".$datos['ID_USUARIO']."','".$datos['NOMBRE_USUARIO']."','".$datos['EMAIL_USUARIO']."','".$datos['FOTO_USUARIO']."');");
            $query->commit();
            return true;

        }catch(PDOException $exc) {

            $query->rollback();
            echo "Error: " . $exc->getMessage();
            return false;

        }           
    }
}

?>