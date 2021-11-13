<?php

include_once 'Clases/publicacion.php';

class editar_publicacionModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get($publicacion){

        //traer los datos de la bbdd
        //$this->objMascota;
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM `V_EDIT_PUBLICACION` WHERE ID_PUBLICACION = :ID_PUBLICACION;");
            $query->execute(['ID_PUBLICACION' => $publicacion]);
            while($row = $query->fetch()){
                $objMascota = new Mascota();
                $objMascota->setSexo_mascota ($row['SEXO_MASCOTA']); 
                $objMascota->setEdad_mascota ($row['EDAD_MASCOTA']); 
                $objMascota->setTamanio_mascota ($row['TAMANIO_MASCOTA']); 
                $objMascota->setEspecie_mascota($row['ID_ESPECIE_MASCOTA']);
                $objMascota->setNombre_mascota ($row['NOMBRE_MASCOTA']); 
                $objMascota->setDescripcion_mascota ($row['DESCRIPCION_MASCOTA']); 
                $objMascota->setFotos_mascota ($row['FOTO_MASCOTA']); 
                $objMascota->setId_mascota($row['ID_MASCOTA']);
                

                
                $objPublicacion= new Publicacion();
                $objPublicacion->setMascota($objMascota);
                $objPublicacion->setId_publicacion($publicacion); 
                $objPublicacion->setEstado($row['ESTADO_PUBLICACION']);
                $objPublicacion->setId_usuario($row['ID_USUARIO']); 
                $objPublicacion->setLocalidad($row['LOCALIDAD']);
                $objPublicacion->setProvincia($row['PROVINCIA']);
                $objPublicacion->setNum_contacto_publicacion($row['NUM_CONTACTO_PUBLICACION']);
                $objPublicacion->setFecha_alta_publicacion($row['FECHA_ALTA_PUBLICACION']);



                
                
            }
            return $objPublicacion;
        } catch (PDOException $exc) {
            return false;
        }
    }


    public function update($objPublicacion){
        //insertar datos en la bbdd

        try{
            

            $Mascota=$objPublicacion->getMascota();
            $query = $this->db->connect();
            $query->beginTransaction();            
            $query->exec("UPDATE `MASCOTA` SET
            `ID_SEXO_MASCOTA`='".$Mascota->getSexo_mascota()."',
            `ID_EDAD_MASCOTA`='".$Mascota->getEdad_mascota()."',
            `ID_TAMANIO_MASCOTA`='".$Mascota->getTamanio_mascota()."',
            `ID_ESPECIE_MASCOTA`='".$Mascota->getEspecie_mascota()."',
            `NOMBRE_MASCOTA`='".$Mascota->getNombre_mascota()."',
            `DESCRIPCION_MASCOTA`='".$Mascota->getDescripcion_mascota()."',
            `FOTOS_MASCOTA`='".$Mascota->getFotos_mascota()."'
            WHERE `ID_MASCOTA`= '".$Mascota->getId_mascota()."' ");
            $query->exec("UPDATE `PUBLICACION` SET 
            `ID_ESTADO`= '".$objPublicacion->getEstado()."',
            `ID_LOCALIDAD`='".$objPublicacion->getLocalidad()."',
            `NUM_CONTACTO_PUBLICACION`='".$objPublicacion->getNum_contacto_publicacion()."'
             WHERE `ID_PUBLICACION`= '".$objPublicacion->getId_publicacion()."' ");
           
            $query->commit();
            return true;

        

        }catch(PDOException $exc) {

            $query->rollback();
            echo "Error: " . $exc->getMessage();
            return false;

        }       
            

       
 
    }

}

?>