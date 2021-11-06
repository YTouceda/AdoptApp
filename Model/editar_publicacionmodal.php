<?php

include_once 'Clases/mascota.php';

class editar_publicacionModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get($mascota){
        $this->item;
        try {
            $query = $this->db->connect()->prepare("SELECT*FROM adoptapp.mascota WHERE ID_MASCOTA = :ID_MASCOTA");
            $query->execute(['ID_ESTADO_MASCOTA' => $mascota]);
            while($row = $query->fetch()){
                $item = new Mascota();
                $item->id_mascota = $row['ID_MASCOTA'];
                $item->id_usuario = $row['ID_USUARIO'];
                $item->nombre_mascota = $row['NOMBRE_MASCOTA'];
                $item->sexo_mascota = $row['ID_SEXO_MASCOTA'];
                $item->edad_mascota = $row['ID_EDAD_MASCOTA'];
                $item->tamanio_mascota = $row['ID_TAMANIO_MASCOTA'];
                $item->descripcion_mascota = $row['DESCRIPCION_MASCOTA'];
                $item->estado_mascota = $row['ID_ESTADO_MASCOTA'];
                $item->ubicacion_mascota = $row['ID_LOCALIDAD'];
                $item->tipo_mascota = $row['ID_TIPO_MASCOTA'];
                $item->fotos_mascota = $row['FOTO_MASCOTA'];
                $item->num_contacto_mascota = $row['NUM_CONTACTO_MASCOTA'];
                $item->fecha_publicado = $row['FECHA_PUBLICADO'];
                array_push($items,$item);
            }
            return $items;
        } catch (PDOException $exc) {
            return false;
        }
    }
}

?>