<?php

class editar_perfilModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        //insertar datos en la base de datos
            $query = $this->db->connect()->prepare('UPDATE `adoptapp`.`datos_personales` SET `NOMBRE_USUARIO` = :NOMBRE_USUARIO, `NUM_CONTACTO_USUARIO` = :NUM_CONTACTO_USUARIO, `EMAIL_USUARIO` = :EMAIL_USUARIO WHERE `ID_USUARIO` = :ID_USUARIO;');
            if($query->execute(['NOMBRE_USUARIO' => $datos['NOMBRE_USUARIO'],'NUM_CONTACTO_USUARIO' => $datos['NUM_CONTACTO_USUARIO'],'EMAIL_USUARIO' => $datos['EMAIL_USUARIO'],'ID_USUARIO' => $datos['ID_USUARIO']])){
                return "Se guardo correctamente los cambios.";
            }else{
                return "No se pudo realizar los cambios.";
            }
        // echo "insertar datos";
    }

}

?>