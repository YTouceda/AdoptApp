<?php

include_once 'Clases/publicacion.php';

class encontradosModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get($num_pagina){
        $items = [];
        try {
            $estado = 'Encontrado';
            $cantidad_publicaciones = 6;
            $pagina = $num_pagina;
            $query = $this->db->connect()->prepare("SELECT  ID_PUBLICACION , ID_USUARIO , NOMBRE_MASCOTA , DESCRIPCION_MASCOTA , FOTO_MASCOTA , NUM_CONTACTO_PUBLICACION , FECHA_ALTA_PUBLICACION , SEXO_MASCOTA , EDAD_MASCOTA , TAMANIO_MASCOTA , ESTADO_PUBLICACION , LOCALIDAD , PROVINCIA , TIPO_ESPECIE_MASCOTA  FROM  V_PUBLICACION  WHERE ESTADO_PUBLICACION = :ESTADO_PUBLICACION");
            $query->bindParam(':ESTADO_PUBLICACION', $estado);
            $query->execute();
            $num_filas = $query->rowCount();
            $total_paginas = ceil($num_filas/$cantidad_publicaciones);
            $desde = ($pagina - 1)*$cantidad_publicaciones;
            $query = $this->db->connect()->prepare("SELECT  ID_PUBLICACION , ID_USUARIO , NOMBRE_MASCOTA , DESCRIPCION_MASCOTA , FOTO_MASCOTA , NUM_CONTACTO_PUBLICACION , FECHA_ALTA_PUBLICACION , SEXO_MASCOTA , EDAD_MASCOTA , TAMANIO_MASCOTA , ESTADO_PUBLICACION , LOCALIDAD , PROVINCIA , TIPO_ESPECIE_MASCOTA  FROM  V_PUBLICACION  WHERE ESTADO_PUBLICACION = :ESTADO_PUBLICACION LIMIT :DESDE,:HASTA");
            $query->bindParam(':ESTADO_PUBLICACION', $estado);
            $query->bindParam(':DESDE', $desde);
            $query->bindParam(':HASTA', $cantidad_publicaciones);
            $query->execute();
            while($row = $query->fetch()){
                $item = new Publicacion();
                $mascota= new Mascota();
                $item->setId_publicacion($row['ID_PUBLICACION']);
                $item->setId_usuario($row['ID_USUARIO']);
                $item->setEstado($row['ESTADO_PUBLICACION']);
                $item->setNum_contacto_publicacion($row['NUM_CONTACTO_PUBLICACION']);
                $item->setFecha_alta_publicacion($row['FECHA_ALTA_PUBLICACION']);
                $mascota->setSexo_mascota($row['SEXO_MASCOTA']);
                $mascota->setEdad_mascota($row['EDAD_MASCOTA']);
                $mascota->setTamanio_mascota($row['TAMANIO_MASCOTA']);
                $item->setLocalidad($row['LOCALIDAD']);
                $item->setProvincia($row['PROVINCIA']);
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