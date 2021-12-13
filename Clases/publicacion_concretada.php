<?php 
class Publicacion_concretada{
    
    private $id_publicacion_concretada;
    private $id_postulacion;
    private $fecha_concretado;
    private $tipo_publicacion;

    function getId_adopcion(){
        return $this->id_adopcion;
    }

    function setId_adopcion($id_adopcion){
        $this->id_adopcion = $id_adopcion;
    }

    function getId_postulacion(){
        return $this->id_postulacion;
    }

    function setId_postulacion($id_postulacion){
        $this->id_postulacion = $id_postulacion;
    }

    function getFecha_adopcion(){
        return $this->fecha_adopcion;
    }

    function setFecha_adopcion($fecha_adopcion){
        $this->fecha_adopcion = $fecha_adopcion;
    }

    function getTipo_publicacion(){
        return $this->tipo_publicacion;
    }

    function setTipo_publicacion($tipo_publicacion){
        $this->tipo_publicacion = $tipo_publicacion;
    }

}


?>