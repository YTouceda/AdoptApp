<?php

include_once 'Clases/mascota.php';

class mis_publicacionesModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get($Id,$num_pagina){
        $items = [];
        try {
            $cantidad_publicaciones = 6;
            $pagina = $num_pagina;
            $query = $this->db->connect()->prepare("SELECT*FROM adoptapp.mascota WHERE ID_USUARIO = :ID_USUARIO;");
            $query->execute(['ID_USUARIO' => $Id]);
            $num_filas = $query->rowCount();
            $total_paginas = ceil($num_filas/$cantidad_publicaciones);
            $desde = ($pagina - 1)*$cantidad_publicaciones;
            $query = $this->db->connect()->prepare("SELECT*FROM adoptapp.mascota WHERE ID_USUARIO = :ID_USUARIO LIMIT :DESDE,:HASTA");
            $query->execute(['ID_USUARIO' => $Id,'DESDE' => $desde,'HASTA' => $cantidad_publicaciones]);
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