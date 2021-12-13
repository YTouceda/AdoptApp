<?php
    // esta funcion crea el json de notificaciones
    if(!empty($this->notificaciones)){
        $notificaciones = ['NOTIFICACIONES' =>[]];
        foreach($this->notificaciones as $row){
            $notificacion = [
                "ID_NOTIFICACION" => $row->getId_notificacion(),
                "ID_USUARIO" => $row->getId_usuario(),
                "MOTIVO" => $row->getMotivo(),
                "FECHA_ALTA" => $row->getFecha(),
                "TITULO" => $row->getTitulo(),
                "ESTADO" => $row->getEstado(),
                "URL" => $row->getUrl(),
            ];
            array_push($notificaciones['NOTIFICACIONES'],$notificacion);
        }
        die(json_encode($notificaciones));
    }
    die(json_encode('No hay notificaciones'));
    
?>