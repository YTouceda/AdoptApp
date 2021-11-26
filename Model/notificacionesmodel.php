<?php

include_once 'Clases/notificacion.php';

class notificacionesModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get($id){
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM V_NOTIFICACION WHERE ID_USUARIO = ".$id.";");
            $query->execute();
            while($row = $query->fetch()){
                $item = new Notificacion();
                $item->setId_notificacion($row['ID_NOTIFICACION']);
                $item->setId_usuario($row['ID_USUARIO']);
                $item->setMotivo($row['MOTIVO']);
                $item->setFecha($row['FECHA_ALTA']);
                $item->setTitulo($row['TITULO']);
                $item->setEstado($row['ESTADO']);
                $item->setUrl($row['URL']);
                array_push($items,$item);
            }
            return $items;
        } catch (PDOException $exc) {
            return false;
        }
    }

    public function set($id,$estado){
        $ESTADO = "";
        if($estado == "no leído"){
            $ESTADO = 1;
        }else if($estado == "leído"){
            $ESTADO = 2;
        }else{
            $ESTADO = 3;
        }
        try {
            $query = $this->db->connect()->prepare("UPDATE NOTIFICACION SET `ESTADO` = ".$ESTADO." WHERE `ID_NOTIFICACION` = ".$id.";");
            $query->execute();
            return true;
        } catch (PDOException $exc) {
            return false;
        }
    }
}

?>