<?php 
class Postulacion{
    private $id_postulacion;
    private $id_publicacion;
    private $estado;
    private $id_usuario_postulado;
    private $fecha_postulacion;
    private $estado_postulacion;
    
public function getId_postulacion(){
 return $this->id_postulacion;
}
public function setId_postulacion($id_postulacion){
 $this->id_postulacion = $id_postulacion;
}
public function getId_publicacion(){
 return $this->id_publicacion;
}
public function setId_publicacion($id_publicacion){
 $this->id_publicacion = $id_publicacion;
}
public function getEstado(){
 return $this->estado;
}
public function setEstado($estado){
 $this->estado = $estado;
}
public function getId_usuario_postulado(){
 return $this->id_usuario_postulado;
}
public function setId_usuario_postulado($id_usuario_postulado){
 $this->id_usuario_postulado = $id_usuario_postulado;
}
public function getFecha_postulacion(){
 return $this->fecha_postulacion;
}
public function setFecha_postulacion($fecha_postulacion){
 $this->fecha_postulacion = $fecha_postulacion;
}
public function getEstado_postulacion(){
 return $this->estado_postulacion;
}
public function setEstado_postulacion($estado_postulacion){
 $this->estado_postulacion = $estado_postulacion;
}
}
?>