<?php

include_once 'Clases/mascota.php';

class abrir_publicacionModel extends Model{

    public function __construct(){
        parent::__construct();

    }

    

    public function getDatos($ID_MASCOTA){
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


}



?>