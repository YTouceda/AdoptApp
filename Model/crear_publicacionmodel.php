<?php


class crear_publicacionModel extends Model{

    public function __construct(){
        parent::__construct();

    }

    public function insert($objPublicacion){
        //insertar datos en la bbdd

        try{
            
            $Mascota=$objPublicacion->getMascota();
            $query = $this->db->connect();
            $query->beginTransaction();            
            $query->exec("INSERT INTO `MASCOTA`(
            `ID_SEXO_MASCOTA`,
            `ID_EDAD_MASCOTA`,
            `ID_TAMANIO_MASCOTA`,
            `ID_ESPECIE_MASCOTA`,
            `NOMBRE_MASCOTA`,
            `DESCRIPCION_MASCOTA`,
            `FOTOS_MASCOTA`)
            VALUES
            ('".$Mascota->getSexo_mascota()."'
            ,'".$Mascota->getEdad_mascota()."'
            ,'".$Mascota->getTamanio_mascota()."'
            ,'".$Mascota->getEspecie_mascota()."'
            ,'".$Mascota->getNombre_mascota()."'
            ,'".$Mascota->getDescripcion_mascota()."'
            ,'".$Mascota->getFotos_mascota()."')");
            $query->exec("INSERT INTO `PUBLICACION`(
            `ID_ESTADO`,
            `ID_USUARIO`,
            `ID_MASCOTA`,
            `ID_LOCALIDAD`,
            `FECHA_ALTA_PUBLICACION`,
            `NUM_CONTACTO_PUBLICACION`) VALUES (
            ':id_estado',
            ':id_usuario',
            ':id_mascota',
            ':id_localidad',
            ':fecha_alta_publicacion',
            ':num_contacto_publicacion')");
            $query->bindParam(':id_estado', $objPublicacion->getEstado());
            $query->bindParam(':id_usuario', $objPublicacion->getId_usuario());
            $query->bindParam(':id_mascota', $objPublicacion->getId_mascota());
            $query->bindParam(':id_localidad', $objPublicacion->getLocalidad());
            $query->bindParam(':fecha_alta_publicacion', $objPublicacion->getFecha_alta_publicacion());
            $query->bindParam(':num_contacto_publicacion', $objPublicacion->getNum_contacto_publicacion());
            $query->commit();
            return true;

        

        }catch(PDOException $exc) {

            $query->rollback();
            echo "Error: " . $exc->getMessage();
            echo "<br>";
            echo var_dump($objPublicacion->getId_usuario());
            return false;

        }       
            

       
 
    }

    


}



?>


