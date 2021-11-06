<?php 

include_once 'Clases/mascota.php';

class Publicacion{
    public $id_publicacion;
    public $estado;
    public $id_usuario;
    public $mascota;
    public $estado_publicacion;
    public $fecha_alta_publicacion;
    public $fecha_baja_publicacion;
    public $num_contacto_publicacion;
    public $localidad;
    public $provincia;

    function __construct(){
        $this->$mascota = new Mascota();
    }
}


?>