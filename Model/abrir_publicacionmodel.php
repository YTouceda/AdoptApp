<?php

include_once 'Clases/publicacion.php';
include_once 'Clases/mascota.php';

class abrir_publicacionModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get($publicacion){
        $items = [];
        try {
            
            $query = $this->db->connect()->prepare("SELECT * FROM `V_PUBLICACION` WHERE ID_PUBLICACION=:ID_PUBLICACION");
            $query->execute(['ID_PUBLICACION' => $publicacion]);
            while($row = $query->fetch()){
                $objPublicacion = new Publicacion();
                $objMascota= new Mascota();
                $objPublicacion->setId_publicacion($row['ID_PUBLICACION']);
                $objPublicacion->setEstado($row['ESTADO_PUBLICACION']);
                $objMascota->setSexo_mascota($row['SEXO_MASCOTA']);
                $objMascota->setEdad_mascota($row['EDAD_MASCOTA']);
                $objMascota->setTamanio_mascota($row['TAMANIO_MASCOTA']);
                $objPublicacion->setLocalidad($row['PROVINCIA']);
                $objPublicacion->setProvincia($row['LOCALIDAD']);
                $objMascota->setEspecie_mascota($row['TIPO_ESPECIE_MASCOTA']);
                $objMascota->setNombre_mascota($row['NOMBRE_MASCOTA']);
                $objMascota->setDescripcion_mascota($row['DESCRIPCION_MASCOTA']);
                $objMascota->setFotos_mascota($row['FOTO_MASCOTA']);
                $objPublicacion->setNum_contacto_publicacion($row['NUM_CONTACTO_PUBLICACION']);
                $objPublicacion->setFecha_alta_publicacion($row['FECHA_ALTA_PUBLICACION']);
                $objPublicacion->setMascota($objMascota);

                // var_dump($objPublicacion);
            }
            
            return $objPublicacion;
        } catch (PDOException $exc) {
            return false;
        }
    }
}

?>