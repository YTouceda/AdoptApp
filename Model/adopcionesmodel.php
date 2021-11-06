<?php

include_once 'Clases/publicacion.php';

class adopcionesModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get($num_pagina){
        $items = [];
        try {
            $cantidad_publicaciones = 6;
            $pagina = $num_pagina;
            $query = $this->db->connect()->prepare("SELECT*FROM adoptapp.mascota WHERE ID_ESTADO_MASCOTA = :ID_ESTADO_MASCOTA;");
            $query->execute(['ID_ESTADO_MASCOTA' => 0]);
            $num_filas = $query->rowCount();
            $total_paginas = ceil($num_filas/$cantidad_publicaciones);
            $desde = ($pagina - 1)*$cantidad_publicaciones;
            $query = $this->db->connect()->prepare("SELECT*FROM adoptapp.mascota WHERE ID_ESTADO_MASCOTA = :ID_ESTADO_MASCOTA LIMIT :DESDE,:HASTA");
            $query->execute(['ID_ESTADO_MASCOTA' => 0,'DESDE' => $desde,'HASTA' => $cantidad_publicaciones]);
            while($row = $query->fetch()){
                $item = new Publicacion();
                $item->id_publicacion = $row['ID_PUBLICACION'];
                $item->id_usuario = $row['ID_USUARIO'];
                $item->estado = $row['ESTADO_PUBLICACION'];
                $item->num_contacto_mascota = $row['NUM_CONTACTO_PUBLICACION'];
                $item->fecha_alta_publicacion = $row['FECHA_ALTA_PUBLICACION'];
                $item->mascota->sexo_mascota = $row['SEXO_MASCOTA'];
                $item->mascota->edad_mascota = $row['EDAD_MASCOTA'];
                $item->mascota->tamanio_mascota = $row['TAMANIO_MASCOTA'];
                $item->localidad = $row['LOCALIDAD'];
                $item->provincia = $row['PROVINCIA'];
                $item->mascota->especie_mascota = $row['TIPO_ESPECIE_MASCOTA'];
                $item->mascota->nombre_mascota = $row['NOMBRE_MASCOTA'];
                $item->mascota->descripcion_mascota = $row['DESCRIPCION_MASCOTA'];
                $item->mascota->fotos_mascota = $row['FOTO_MASCOTA'];
                array_push($items,$item);
            }
            $datos = ['items' => $items, 'total' => $total_paginas];
            return $datos;
        } catch (PDOException $exc) {
            return false;
        }
    }
}

?>