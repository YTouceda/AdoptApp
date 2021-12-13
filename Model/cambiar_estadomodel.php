<?php

include_once 'Clases/publicacion.php';

class cambiar_estadoModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function cambiar_estado(){
        try {
            $query = $this->db->connect()->prepare("SELECT ID_PUBLICACION, (SELECT TIMESTAMPDIFF(DAY,FECHA_ALTA_PUBLICACION , NOW())) AS DIAS_TRANSCURRIDOS FROM PUBLICACION WHERE ID_ESTADO = 3;");
            $query->execute();
            while($row = $query->fetch()){
                $diff=($row['DIAS_TRANSCURRIDOS']);
                if($diff == 30){
                    $query = $this->db->connect()->prepare("INSERT INTO NOTIFICACION (`MOTIVO`, `FECHA_ALTA`, `ESTADO`, `URL`, `ID_USUARIO`) VALUES (3,SYSDATE(),1,'editar_publicacion?publicacion=".$row['ID_PUBLICACION']."',".$_SESSION['id'].")");
                    $query->execute();
                }
            }
            return true;
        } catch (PDOException $exc) {
            return $exc;
        }
    }
    
      public function desbanear_usuarios(){
        try {
            $query = $this->db->connect()->prepare("UPDATE `USUARIO` SET `ESTADO_BLOQUEO`= NULL WHERE `ESTADO_BLOQUEO` < SYSDATE();");
            $query->execute();
            return true;
        } catch (PDOException $exc) {
            return $exc;
        }
    }
    
    

}

?>