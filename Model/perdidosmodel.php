<?php

include_once 'Clases/mascota.php';

class perdidosModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get($num_pagina){
        $items = [];
        try {
            $cantidad_publicaciones = 6;
            $pagina = $num_pagina;
            $query = $this->db->connect()->prepare("SELECT*FROM adoptapp.mascota WHERE ID_ESTADO_MASCOTA = :ID_ESTADO_MASCOTA1 OR ID_ESTADO_MASCOTA = :ID_ESTADO_MASCOTA2;");
            $query->execute(['ID_ESTADO_MASCOTA1' => 1, 'ID_ESTADO_MASCOTA2' => 2]);
            $num_filas = $query->rowCount();
            $total_paginas = ceil($num_filas/$cantidad_publicaciones);
            $desde = ($pagina - 1)*$cantidad_publicaciones;
            $query = $this->db->connect()->prepare("SELECT*FROM adoptapp.mascota WHERE ID_ESTADO_MASCOTA = :ID_ESTADO_MASCOTA1 OR ID_ESTADO_MASCOTA = :ID_ESTADO_MASCOTA2 LIMIT :DESDE,:HASTA");
            $query->execute(['ID_ESTADO_MASCOTA1' => 1, 'ID_ESTADO_MASCOTA2' => 2,'DESDE' => $desde,'HASTA' => $cantidad_publicaciones]);
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