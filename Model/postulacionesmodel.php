<?php

include_once 'Clases/mascota.php';
include_once 'Clases/usuario.php';

class postulacionesModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getPostulaciones($ID_PUBLICACION){
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM POSTULACION WHERE ID_PUBLICACION = :ID_PUBLICACION");
            $query->execute(['ID_PUBLICACION' => $ID_PUBLICACION]);
            while($row = $query->fetch()){
                $user= new Usuario();
                $user->setUsuario($row['ID_USUARIO_POSTULADO']);
                $item=[
                    'POSTULACION' => $row['ID_POSTULACION'],
                    'PUBLICACION' => $row['ID_PUBLICACION'],
                    'USUARIO_POSTULADO' => $user
                ];
                array_push($items,$item);
            }
            return $items;
        } catch (PDOException $exc) {
            return false;
        }
    }
}

?>