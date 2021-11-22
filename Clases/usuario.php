<?php
include_once 'Clases/datos_personales.php';
include_once 'Model/usuariomodel.php';
include_once 'Libs/model.php';
class Usuario extends Controller{
    private $id_usuario;
    private $id_permiso;
    private $estado_bloqueo;
    private $datos_personales;
    function __construct(){
        $this->datos_personales = new Datos_Personales();
    }
    public function getId(){
        return $this->id_usuario;
    }
    public function getPermisos(){
        return $this->id_permiso;
    }
    public function getNombre(){
        return $this->datos_personales->getNombre_usuario();
    }
    public function getNumero(){
        return $this->datos_personales->getNum_contacto_usuario();
    }
    public function getEmail(){
        return $this->datos_personales->getEmail_usuario();
    }
    public function getFoto(){
        return $this->datos_personales->getFoto_perfil();
    }
    public function setId($id){
        $this->id_usuario = $id;
    }
    public function setPermisos($permiso){
        $this->id_permiso = $permiso;
    }
    public function setNombre($nombre){
        $this->datos_personales->setNombre_usuario($nombre);
    }
    public function setNumero($num){
        $this->datos_personales->setNum_contacto_usuario($num);
    }
    public function setEmail($email){
        $this->datos_personales->setEmail_usuario($email);
    }
    public function setFoto($foto){
        $this->datos_personales->setFoto_perfil($foto);
    }
    public function setUsuario($Id){
        $datos = new usuarioModel();
        $datos = $datos->getUsuario($Id);
        $this->id_usuario = $datos['ID_USUARIO'];
        $this->id_permiso = $datos['NOMBRE_PERMISO'];
        $this->datos_personales->setNombre_usuario($datos['NOMBRE_USUARIO']);
        $this->datos_personales->setNum_contacto_usuario($datos['NUM_CONTACTO_USUARIO']);
        $this->datos_personales->setEmail_usuario($datos['EMAIL_USUARIO']);
        $this->datos_personales->setFoto_perfil($datos['FOTO_PERFIL']);
    }
}
?>