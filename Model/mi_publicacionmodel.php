<?php

include_once 'Model/mascota.php';

class mi_publicacionModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get($ID_MASCOTA){
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM adoptapp.v_mascota WHERE ID_MASCOTA = :ID_MASCOTA");
            $query->execute(['ID_MASCOTA' => $ID_MASCOTA]);
            $row = $query->fetch();
            $item = new Mascota();
            $item->id_mascota = $row['ID_MASCOTA'];
            $item->id_usuario = $row['ID_USUARIO'];
            $item->nombre_mascota = $row['NOMBRE_MASCOTA'];
            $item->descripcion_mascota = $row['DESCRIPCION_MASCOTA'];
            $item->fotos_mascota = $row['FOTO_MASCOTA'];
            $item->num_contacto_mascota = $row['NUM_CONTACTO_MASCOTA'];
            $item->fecha_publicado = $row['FECHA_PUBLICADO'];
            $item->sexo_mascota = $row['SEXO_MASCOTA'];
            $item->edad_mascota = $row['EDAD_MASCOTA'];
            $item->tamanio_mascota = $row['TAMANIO_MASCOTA'];
            $item->estado_mascota = $row['ESTADO_MASCOTA'];
            $item->localidad_mascota = $row['LOCALIDAD'];
            $item->provincia_mascota = $row['PROVINCIA'];
            $item->tipo_mascota = $row['TIPO_MASCOTA'];
            return $item;
        } catch (PDOException $exc) {
            return false;
        }
    }
    public function getPostulaciones($ID_MASCOTA){
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

    public function insertNuevaAdopcion($ID_POSTULACION){
        $query = $this->db->connect()->prepare("INSERT INTO `adoptapp`.`adopcion`(`ID_POSTULACION`)VALUES(:ID_POSTULACION);");
        if($query->execute(['ID_POSTULACION' => $ID_POSTULACION])){
            return true;
        }else{
            return false;
        }
    }
}

?>