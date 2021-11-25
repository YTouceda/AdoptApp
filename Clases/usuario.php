<?php
include_once 'Clases/datos_personales.php';
include_once 'Model/usuariomodel.php';
include_once 'Libs/model.php';
class Usuario extends Controller{
    private $id_usuario;
    private $nombre_rol;
    private $permisos;
    private $estado_bloqueo;
    private $datos_personales;
    function __construct(){
        $this->datos_personales = new Datos_Personales();
    }
    public function getId(){
        return $this->id_usuario;
    }
    public function getPermisos(){
        return $this->permisos;
    }
    public function getRol(){
        return $this->nombre_rol;
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
    public function getEstado_bloqueo(){
        return $this->estado_bloqueo;
    }
    public function setEstado_bloqueo($estado_bloqueo){
        $this->estado_bloqueo = $estado_bloqueo;
    }
    public function setId($id){
        $this->id_usuario = $id;
    }
    public function setPermisos($permisos){
        $this->permisos = $permisos;
    }
    public function setRol($rol){
        $this->nombre_rol = $rol;
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
        $this->nombre_rol = $datos['NOMBRE_ROL'];
        $this->estado_bloqueo = $datos['ESTADO_BLOQUEO'];
        $this->datos_personales->setNombre_usuario($datos['NOMBRE_USUARIO']);
        $this->datos_personales->setNum_contacto_usuario($datos['NUM_CONTACTO_USUARIO']);
        $this->datos_personales->setEmail_usuario($datos['EMAIL_USUARIO']);
        $this->datos_personales->setFoto_perfil($datos['FOTO_PERFIL']);
        $this->permisos = $datos['PERMISOS'];
    }
    public function puede($permiso){
        if($this->estado_bloqueo != NULL){
            return false;
        }
        foreach($this->permisos as $permiso_usuario){
            if($permiso_usuario == $permiso){
                return true;
            }
        }
        return false;
    }
}
?>