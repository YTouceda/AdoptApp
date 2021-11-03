<?php

include_once 'Model/mascota.php';
include_once 'Libs/user.php';

class postulacionesModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get($ID_MASCOTA){
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM adoptapp.postulaciones WHERE ID_MASCOTA = :ID_MASCOTA");
            $query->execute(['ID_MASCOTA' => $ID_MASCOTA]);
            while($row = $query->fetch()){
                $user= new user();
                $user->setUser($row['ID_USUARIO_POSTULADO']);
                $item=[
                    'POSTULACION' => $row['ID_POSTULACION'],
                    'MASCOTA' => $row['ID_MASCOTA'],
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