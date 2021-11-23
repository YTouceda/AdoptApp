<?php
include_once 'Clases/publicacion.php';
include_once 'Clases/denuncia.php';
class abrir_publicacionModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    function eliminar($id_Publicacion){
        $dataTime = date("Y-m-d H:i:s");
        try{
        $query = $this->db->connect()->prepare("UPDATE `PUBLICACION` SET `FECHA_BAJA_PUBLICACION`= '".$dataTime."' WHERE `ID_PUBLICACION` = :ID_PUBLICACION ");
        $query->execute(['ID_PUBLICACION' => $id_Publicacion]);
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage();
            return false;
        }
    }
    function denunciar($objDenuncia){
        $dataTime = date("Y-m-d H:i:s");
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
            '".$dataTime."'
            ) ");
            $query->execute();
            $this->contarDenuncias($objDenuncia->getId_publicacion());
            } catch (PDOException $exc) {
                echo "Error: " . $exc->getMessage();
                return false;
            }
    }
    function updatePublicaciones($fecha,$usuario,$estado){
        
        try{
        $query = $this->db->connect()->prepare("UPDATE `publicacion` SET `ID_ESTADO`='".$estado."',`FECHA_BAJA_PUBLICACION`='".$fecha."' WHERE `ID_USUARIO` = :`ID_USUARIO` ");
        $query->execute(['ID_USUARIO' => $usuario]);
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage();
            return false;
        }
    }
    function suspenderUsuario($usuario){
        $dataTime = date("Y-m-d H:i:s");
        try{
        date_add($dataTime, date_interval_create_from_date_string("1 month"));
        $query = $this->db->connect()->prepare("UPDATE `usuario` SET `ESTADO_BLOQUEO` = '".$dataTime."' WHERE `ID_USUARIO` = :ID_USUARIO ");
        $query->execute(['ID_USUARIO' => $usuario]);
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage();
            return false;
        }
        $estado="Suspendida";
        $this->updatePublicaciones($dataTime,$usuario,$estado);
    }
    function banearUsuario($usuario){
        $dataTime = date_create("3000-01-01");
        try{
        $query = $this->db->connect()->prepare("UPDATE `usuario` SET `ESTADO_BLOQUEO` = '".$dataTime."' WHERE `ID_USUARIO` = :ID_USUARIO ");
        $query->execute(['ID_USUARIO' => $usuario]);
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage();
            return false;
        }
        $estado="Eliminada";
        $this->updatePublicaciones($dataTime,$usuario,$estado);
    }
    function contarDenuncias($publicacion){
        try{
            $query = $this->db->connect()->prepare("SELECT * FROM `V_DENUNCIA` WHERE `ID_PUBLICACION` = ".$publicacion."");
            $query->execute();
            $num_filas = $query->rowCount();
            // var_dump($num_filas);
            if($num_filas>=3){
                $this->eliminar($publicacion);
            }
            $row=$query->fetch();
            $usuario_denunciado=$row['USUARIO_DENUNCIADO'];
            
            $query = $this->db->connect()->prepare("SELECT * FROM `v_denuncia` WHERE `ESTADO_PUBLICACION` = 'Eliminada' AND `USUARIO_DENUNCIADO` =  ".$usuario_denunciado."");
            $query->execute();
            $num_filas = $query->rowCount();
            if($num_filas>=6){
                $this->banearUsuario($usuario_denunciado);
            }
            if($num_filas>=3){
                $this->suspenderUsuario($usuario_denunciado);
            }
            
            } catch (PDOException $exc) {
                echo "Error: " . $exc->getMessage();
                return false;
            }
    }
    function validarDenuncia($objDenuncia){
        $query= $this->db->connect()->prepare("SELECT `ID_PUBLICACION` FROM `DENUNCIA` WHERE `ID_USUARIO_DENUNCIANTE` = ".$objDenuncia->getId_usuario_denunciante()." AND `ID_PUBLICACION`=".$objDenuncia->getId_publicacion()." ");
        $query->execute();
        $num_filas = $query->rowCount();
        if($num_filas>0){
            return false;
        }
        else{
            return true;
        }
    }
    function time_passed($fechaCreacion){
        
        
        $timestamp = strtotime($fechaCreacion);
        $diff = time() - (int)$timestamp;
        if ($diff == 0) 
            return 'justo ahora';
        // if ($diff > 604800)
        //     return date("d M Y",$timestamp);
        $intervals = array
        (
                1                   => array('año',    31556926),
            $diff < 31556926    => array('mes',   2628000),
            $diff < 2629744     => array('semana',    604800),
            $diff < 604800      => array('día',     86400),
            $diff < 86400       => array('hora',    3600),
            $diff < 3600        => array('minuto',  60),
            $diff < 60          => array('segundo',  1)
        );
        
        $aux = "";
        
        if($intervals[1][0] == "mes"){
            if (floor($diff/$intervals[1][1]) > 1) {
                $aux = $intervals[1][0].'es';
            }else{
                $aux = $intervals[1][0];
            }
        }else{
            if (floor($diff/$intervals[1][1]) > 1) {
                $aux = $intervals[1][0].'s';
            }
            else{
                $aux = $intervals[1][0];
            }
        }
        $value = floor($diff/$intervals[1][1]);
        $devuelto ='hace '.$value.' '.$aux;
        
        return $devuelto;
        
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
                $objPublicacion->setId_usuario($row['ID_USUARIO']);
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
                $objPublicacion->setFecha_alta_publicacion($this->time_passed($row['FECHA_ALTA_PUBLICACION']));
                $objPublicacion->setMascota($objMascota);
                //var_dump($objPublicacion);
            }
            
            return $objPublicacion;
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage();
            return false;
        }
    }
    //Generar Postulacion
    public function setPostulacion($Id_publicacion){
        $dataTime = date("Y-m-d H:i:s");
        try {
            $id_usuario = $this->devolverUsuarioPubli($Id_publicacion);
            $query = $this->db->connect();
            $query->beginTransaction();            
            $query->exec("INSERT INTO `POSTULACION`(`ID_PUBLICACION`,`ID_USUARIO_POSTULADO`, `FECHA_POSTULACION`, `ESTADO_POSTULACION`) VALUES (".$Id_publicacion.",".$_SESSION['id'].",'".$dataTime."','1');");
            $query->exec("INSERT INTO `NOTIFICACION` (`MOTIVO`,`FECHA_ALTA`,`ESTADO`,`URL`,`ID_USUARIO`) VALUES(1,'".$dataTime."',1,'abrir_publicacion?publicacion=".$Id_publicacion."',".$id_usuario['ID_USUARIO'].");");
            $query->commit();
            return true;
        }catch(PDOException $exc) {
            $query->rollback();
            echo "Error: " . $exc->getMessage();
            return false;
        }
    }
    function validarPostulante($objPostulante){
        $query= $this->db->connect()->prepare("SELECT `ID_PUBLICACION` FROM `POSTULACION` WHERE `ID_USUARIO_POSTULADO` = ".$objPostulante->getId_usuario_postulante()." AND `ID_PUBLICACION`=".$objPostulacion->getId_publicacion()." ");
        $query->execute();
        $num_filas = $query->rowCount();
        if($num_filas>0){
            return false;
        }
        else{
            return true;
        }
    }
    public function getPostulaciones($ID_PUBLICACION){
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM POSTULACION WHERE ID_PUBLICACION = :ID_PUBLICACION AND ESTADO_POSTULACION != 3");
            $query->execute(['ID_PUBLICACION' => $ID_PUBLICACION]);
            while($row = $query->fetch()){
                $user= new Usuario();
                $user->setUsuario($row['ID_USUARIO_POSTULADO']);
                $item=[
                    'ESTADO_POSTULACION' => $row['ESTADO_POSTULACION'],
                    'POSTULACION' => $row['ID_POSTULACION'],
                    'USUARIO_POSTULADO' => $user
                ];
                array_push($items,$item);
            }
            return $items;
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage();
            return false;
        }
    }
    public function cancelarPostulacion($postulacion){
        try{
            $query = $this->db->connect()->prepare("UPDATE `POSTULACION` SET `ESTADO_POSTULACION`= 3 WHERE `ID_USUARIO_POSTULADO` = ".$postulacion." ");
            $query->execute();
            } catch (PDOException $exc) {
                echo "Error: " . $exc->getMessage();
                return false;
            }
    }
    
    function devolverUsuarioPubli($Id_publicacion){
        $query = $this->db->connect();
        $query= $this->db->connect()->prepare("SELECT ID_USUARIO FROM PUBLICACION WHERE ID_PUBLICACION = ".$Id_publicacion.";");
        $query->execute();
        return $query->fetch();
    }
    
    function eliminarPostulacion($id_postulacion){
        $dataTime = date("Y-m-d H:i:s");
        try {
            $datos = $this->traerDatos($id_postulacion);
            $query = $this->db->connect();
            $query->beginTransaction();
            $query->exec("UPDATE `POSTULACION` SET `ESTADO_POSTULACION` = 2 WHERE `ID_POSTULACION` = ".$id_postulacion.";");       
            $query->exec("INSERT INTO `NOTIFICACION` (`MOTIVO`,`FECHA_ALTA`,`ESTADO`,`URL`,`ID_USUARIO`) VALUES(4,'".$dataTime."',2,'abrir_publicacion?publicacion=".$datos['ID_PUBLICACION']."',".$datos['ID_USUARIO_POSTULADO'].");");
            $query->commit();
            return true;
        }catch(PDOException $exc) {
            $query->rollback();
            echo "Error: " . $exc->getMessage();
            return false;
        }
    }
    function getAdopcion($id_postulacion){
        $dataTime = date("Y-m-d H:i:s");
        try {
            $datos = $this->traerDatos($id_postulacion);
            $query = $this->db->connect();
            $query->beginTransaction();            
            $query->exec("UPDATE `POSTULACION` SET `ESTADO_POSTULACION` = 4 WHERE `ID_POSTULACION` = ".$id_postulacion.";");
            $query->exec("INSERT INTO `ADOPCION` (`ID_POSTULACION`,`FECHA_ADOPCION`) VALUES (".$id_postulacion.",'".$dataTime."');");
            $query->exec("INSERT INTO `NOTIFICACION` (`MOTIVO`,`FECHA_ALTA`,`ESTADO`,`URL`,`ID_USUARIO`) VALUES(2,'".$dataTime."',1,'abrir_publicacion?publicacion=".$datos['ID_PUBLICACION']."',".$datos['ID_USUARIO_POSTULADO'].");");
            $query->commit();
            return true;
        }catch(PDOException $exc) {
            $query->rollback();
            echo "Error: " . $exc->getMessage();
            return false;
        }
        
    }
    function traerDatos($id_postulacion){
        $query = $this->db->connect();
        $query= $this->db->connect()->prepare("SELECT `POSTULACION`.`ID_USUARIO_POSTULADO`, `POSTULACION`.`ID_PUBLICACION` FROM `POSTULACION` WHERE ID_POSTULACION = ".$id_postulacion.";");
        $query->execute();
        return $query->fetch();
    }
    
}
?>