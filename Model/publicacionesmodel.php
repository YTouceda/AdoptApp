<?php

include_once 'Clases/publicacion.php';
include_once 'Clases/mascota.php';

class publicacionesModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get($where , $num_pagina){
        $items = [];
        try {
            $cantidad_publicaciones = 6;
            $pagina = $num_pagina;
            $query = $this->db->connect()->prepare("SELECT  ID_PUBLICACION, FECHA_BAJA_PUBLICACION, NOMBRE_MASCOTA, DESCRIPCION_MASCOTA, FOTO_MASCOTA, TIPO_ESPECIE_MASCOTA, SEXO_MASCOTA, EDAD_MASCOTA, TAMANIO_MASCOTA, ESTADO_PUBLICACION, ID_LOCALIDAD, LOCALIDAD, ID_PROVINCIA, PROVINCIA  FROM  V_MOSTRAR_PUBLICACION  ".$where);
            $query->execute();
            $num_filas = $query->rowCount();
            $total_paginas = ceil($num_filas/$cantidad_publicaciones);
            $desde = ($pagina - 1)*$cantidad_publicaciones;
            $query = $this->db->connect()->prepare("SELECT  ID_PUBLICACION, FECHA_BAJA_PUBLICACION, NOMBRE_MASCOTA, DESCRIPCION_MASCOTA, FOTO_MASCOTA, TIPO_ESPECIE_MASCOTA, SEXO_MASCOTA, EDAD_MASCOTA, TAMANIO_MASCOTA, ESTADO_PUBLICACION, ID_LOCALIDAD, LOCALIDAD, ID_PROVINCIA, PROVINCIA  FROM  V_MOSTRAR_PUBLICACION ".$where." LIMIT ".$desde.",".$cantidad_publicaciones.";");
            $query->execute();
            while($row = $query->fetch()){
                $item = new Publicacion();
                $mascota= new Mascota();
                $item->setId_publicacion($row['ID_PUBLICACION']);
                $item->setEstado($row['ESTADO_PUBLICACION']);
                $item->setFecha_baja_publicacion($row['FECHA_BAJA_PUBLICACION']);
                $mascota->setSexo_mascota($row['SEXO_MASCOTA']);
                $mascota->setEdad_mascota($row['EDAD_MASCOTA']);
                $mascota->setTamanio_mascota($row['TAMANIO_MASCOTA']);
                $item->setLocalidad($row['ID_PROVINCIA']);
                $item->setProvincia($row['ID_LOCALIDAD']);
                $mascota->setEspecie_mascota($row['TIPO_ESPECIE_MASCOTA']);
                $mascota->setNombre_mascota($row['NOMBRE_MASCOTA']);
                $mascota->setDescripcion_mascota($row['DESCRIPCION_MASCOTA']);
                $mascota->setFotos_mascota($row['FOTO_MASCOTA']);
                $item->setMascota($mascota);
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