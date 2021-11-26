<?php

class Notificacion{
     private $id_notificacion;
     private $id_usuario;
     private $motivo;
     private $fecha;
     private $titulo;
     private $estado;
     private $url;
     
     public function getId_notificacion(){
          return $this->id_notificacion;
     }
     public function getId_usuario(){
          return $this->id_usuario;
     }
     public function getMotivo(){
          return $this->motivo;
     }
     public function getFecha(){
          return $this->fecha;
     }
     public function getTitulo(){
          return $this->titulo;
     }
     public function getEstado(){
          return $this->estado;
     }
     public function getUrl(){
          return $this->url;
     }

     public function setId_notificacion($id){
          $this->id_notificacion = $id;
     }
     public function setId_usuario($usuario){
          $this->id_usuario = $usuario;
     }
     public function setMotivo($motivo){
          $this->motivo = $motivo;
     }
     public function setFecha($fecha){
          $this->fecha = $fecha;
     }
     public function setTitulo($titulo){
          $this->titulo = $titulo;
     }
     public function setEstado($estado){
          $this->estado = $estado;
     }
     public function setUrl($url){
          $this->url = $url;
     }
}

?>