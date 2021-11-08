<?php

include_once 'Clases/mascota.php';

class mi_publicacionModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT  ID_PUBLICACION, FECHA_BAJA_PUBLICACION, NOMBRE_MASCOTA, DESCRIPCION_MASCOTA, FOTO_MASCOTA, TIPO_ESPECIE_MASCOTA, SEXO_MASCOTA, EDAD_MASCOTA, TAMANIO_MASCOTA, ESTADO_PUBLICACION, ID_LOCALIDAD, LOCALIDAD, ID_PROVINCIA, PROVINCIA  FROM  ID_PUBLICACION ");
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
            }
            return $items;
        } catch (PDOException $exc) {
            return false;
        }
    }
    public function getPostulaciones($ID_MASCOTA){
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM POSTULACIONES WHERE ID_MASCOTA = :ID_MASCOTA");
            $query->execute(['ID_MASCOTA' => $ID_MASCOTA]);
            while($row = $query->fetch()){
                $user= new Usuario();
                $user->setUsuario($row['ID_USUARIO_POSTULADO']);
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
        $query = $this->db->connect()->prepare("INSERT INTO ADOPCION(`ID_POSTULACION`)VALUES(:ID_POSTULACION);");
        if($query->execute(['ID_POSTULACION' => $ID_POSTULACION])){
            return true;
        }else{
            return false;
        }
    }
}

?>