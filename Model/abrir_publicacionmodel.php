<?php

include_once 'Clases/publicacion.php';
include_once 'Clases/denuncia.php';

class abrir_publicacionModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get($publicacion){
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
                $objPublicacion->setId_usuario($row['ID_USUARIO']);
                $objPublicacion->setMascota($objMascota);

                // var_dump($objPublicacion);
            }
            
            return $objPublicacion;
        } catch (PDOException $exc) {
            return false;
        }
    }

    function eliminar($id_Publicacion){
        try{
        $query = $this->db->connect()->prepare("UPDATE `PUBLICACION` SET `FECHA_BAJA_PUBLICACION`= SYSDATE() WHERE `ID_PUBLICACION` = :ID_PUBLICACION ");
        $query->execute(['ID_PUBLICACION' => $id_Publicacion]);
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage();
            return false;
        }
    }

    function denunciar($objDenuncia){
        try{
            $query = $this->db->connect()->prepare("INSERT INTO `DENUNCIA`(
            `ID_TIPO_DENUNCIA`,
            `ID_PUBLICACION`,
            `ID_USUARIO_DENUNCIANTE`,
            `DESCRIPCION`,
            `FECHA_DENUNCIA`) 
            VALUES 
           (".$objDenuncia->getId_tipo_denuncia().",
            ".$objDenuncia->getId_publicacion().",
            ".$objDenuncia->getId_usuario_denunciante().",
            '".$objDenuncia->getDescripcion()."',
            SYSDATE()
            ) ");
            $query->execute();
            $this->contarDenuncias($objDenuncia->getId_publicacion());
            } catch (PDOException $exc) {
                echo "Error: " . $exc->getMessage();
                return false;
            }
    }
    function contarDenuncias($publicacion){
        try{
            $query = $this->db->connect()->prepare("SELECT `ID_DENUNCIA` FROM `DENUNCIA` WHERE `ID_PUBLICACION` = ".$publicacion."");
            $query->execute();
            $num_filas = $query->rowCount();
            var_dump($num_filas);
            if($num_filas>=3){
                $this->eliminar($publicacion);
            }
            } catch (PDOException $exc) {
                echo "Error: " . $exc->getMessage();
                return false;
            }

    }
    function validarDenuncia($objDenuncia){
        $query= $this->db->connect()->prepare("SELECT `ID_PUBLICACION` FROM `denuncia` WHERE `ID_USUARIO_DENUNCIANTE` = ".$objDenuncia->getId_usuario_denunciante()." AND `ID_PUBLICACION`=".$objDenuncia->getId_publicacion()." ");
        $query->execute();
        $num_filas = $query->rowCount();
        if($num_filas>0){
            return false;
        }
        else{
            return true;
        }
    }

    
}

?>