<?php 
include_once 'Clases/mascota.php';
class Publicacion{
    private $id_publicacion;
    private $estado;
    private $id_usuario;
    private $mascota;
    private $fecha_alta_publicacion;
    private $fecha_baja_publicacion;
    private $num_contacto_publicacion;
    private $localidad;
    private $provincia;
    function __construct(){
        $this->mascota = new Mascota();
    }
    public function getId_publicacion(){
        return $this->id_publicacion;
    } 
    public function getEstado(){
        return $this->estado;
    } 
    public function getId_usuario(){
        return $this->id_usuario;
    } 
    public function getMascota(){
        return $this->mascota;
    } 
    public function getFecha_alta_publicacion(){
        return $this->fecha_alta_publicacion;
    } 
    public function getFecha_baja_publicacion(){
        return $this->fecha_baja_publicacion;
    } 
    public function getNum_contacto_publicacion(){
        return $this->num_contacto_publicacion;
    } 
    public function getLocalidad(){
        return $this->localidad;
    } 
    public function getProvincia(){
        return $this->provincia;
    }
    public function setId_publicacion($Id_publicacion){
        $this->id_publicacion = $Id_publicacion;
    }
    public function setEstado($Estado){
        $this->estado = $Estado;
    }
    public function setId_usuario($Id_usuario){
        $this->id_usuario = $Id_usuario;
    }
    public function setMascota($Mascota){
        $this->mascota = $Mascota;
    }
    public function setFecha_alta_publicacion($Fecha_alta_publicacion){
        $this->fecha_alta_publicacion = $Fecha_alta_publicacion;
    }
    public function setFecha_baja_publicacion($Fecha_baja_publicacion){
        $this->fecha_baja_publicacion = $Fecha_baja_publicacion;
    }
    public function setNum_contacto_publicacion($Num_contacto_publicacion){
        $this->num_contacto_publicacion = $Num_contacto_publicacion;
    }
    public function setLocalidad($Localidad){
        $this->localidad = $Localidad;
    }
    public function setProvincia($Provincia){
        $this->provincia = $Provincia;
    }
}
?>
