<?php 
class Denuncia{
    private $id_denuncia;
    private $id_tipo_denuncia;
    private $id_publicacion;
    private $id_usuario_denunciante;
    private $descripcion;
    private $fecha_denuncia;
    public function getId_publicacion(){
        return $this->id_publicacion;
    }
    public function getId_denuncia(){
        return $this->id_denuncia;
    }
    public function getId_tipo_denuncia(){
        return $this->id_tipo_denuncia;
    }
    public function getId_usuario_denunciante(){
        return $this->id_usuario_denunciante;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getFecha_denuncia(){
        return $this->fecha_denuncia;
    }
    
    public function setId_publicacion($Id_publicacion){
        $this->id_publicacion = $Id_publicacion;
    }
    public function setId_tipo_denuncia($Id_tipo_denuncia){
        $this->id_tipo_denuncia = $Id_tipo_denuncia;
    }
    public function setId_denuncia($Id_denuncia){
        $this->id_denuncia = $Id_denuncia;
    }
    public function setId_usuario_denunciante($Id_usuario_denunciante){
        $this->id_usuario_denunciante = $Id_usuario_denunciante;
    }
    public function setDescripcion($Descripcion){
        $this->descripcion = $Descripcion;
    }
    public function setFecha_denuncia($Fecha_denuncia){
        $this->fecha_denuncia = $Fecha_denuncia;
    }
    
}
?>