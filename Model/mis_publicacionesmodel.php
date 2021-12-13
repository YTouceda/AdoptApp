<?php
include_once 'Clases/publicacion.php';
class mis_publicacionesModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    function time_passed($fechaCreacion){
        
        
        $timestamp = strtotime($fechaCreacion);
        $diff = time() - (int)$timestamp;
        if ($diff == 0) 
            return 'justo ahora';
        // if ($diff > 604800)
        //     return date("d M Y",$timestamp);
        $intervals = array
        (
                1                   => array('año',    31556926),
            $diff < 31556926    => array('mes',   2628000),
            $diff < 2629744     => array('semana',    604800),
            $diff < 604800      => array('día',     86400),
            $diff < 86400       => array('hora',    3600),
            $diff < 3600        => array('minuto',  60),
            $diff < 60          => array('segundo',  1)
        );
        
        $aux = "";
        
        if($intervals[1][0] == "mes"){
            if (floor($diff/$intervals[1][1]) > 1) {
                $aux = $intervals[1][0].'es';
            }else{
                $aux = $intervals[1][0];
            }
        }else{
            if (floor($diff/$intervals[1][1]) > 1) {
                $aux = $intervals[1][0].'s';
            }
            else{
                $aux = $intervals[1][0];
            }
        }
        $value = floor($diff/$intervals[1][1]);
        $devuelto ='hace '.$value.' '.$aux;
        
        return $devuelto;
        
    }
    public function get($idUsuario,$num_pagina){
        $publicaciones = [];
        try {
            $cantidad_publicaciones = 6;
            $pagina = $num_pagina;
            $query = $this->db->connect()->prepare("SELECT * FROM `V_MIS_PUBLICACIONES` WHERE `ID_USUARIO` = :ID_USUARIO;");
            $query->execute(['ID_USUARIO' => $idUsuario]);
            $num_filas = $query->rowCount();
            $total_paginas = ceil($num_filas/$cantidad_publicaciones);
            $desde = ($pagina - 1)*$cantidad_publicaciones;
            $query = $this->db->connect()->prepare("SELECT * FROM V_MIS_PUBLICACIONES WHERE ID_USUARIO = ".$idUsuario." LIMIT ".$desde.",".$cantidad_publicaciones." ");
            //$query->execute(['ID_USUARIO' => $idUsuario,'DESDE' => $desde,'HASTA' => $cantidad_publicaciones]);
            $query->execute();
            while($row = $query->fetch()){
                $objPublicacion=new Publicacion();
                $objMascota = new Mascota();
                $objPublicacion->setMascota($objMascota);
                $objMascota->setNombre_mascota($row['NOMBRE_MASCOTA']);  
                $objMascota->setSexo_mascota($row['SEXO_MASCOTA']);  
                $objMascota->setEdad_mascota($row['EDAD_MASCOTA']);  
                $objMascota->setTamanio_mascota($row['TAMANIO_MASCOTA']);  
                $objMascota->setDescripcion_mascota($row['DESCRIPCION_MASCOTA']);  
                $objMascota->setEspecie_mascota($row['TIPO_ESPECIE_MASCOTA']);  
                $objMascota->setFotos_mascota($row['FOTO_MASCOTA']);  
                
                
                $objPublicacion->setId_publicacion($row['ID_PUBLICACION']);
                //$objPublicacion->setNum_contacto_publicacion($row['NUM_CONTACTO_MASCOTA']);
                $objPublicacion->setEstado($row['ESTADO_PUBLICACION']);
                $objPublicacion->setId_usuario($row['ID_USUARIO']);
                $objPublicacion->setLocalidad($row['LOCALIDAD']);
                $objPublicacion->setProvincia($row['PROVINCIA']);
                $objPublicacion->setFecha_alta_publicacion($this->time_passed($row['FECHA_ALTA_PUBLICACION']));
                $objPublicacion->setFecha_baja_publicacion($row['FECHA_BAJA_PUBLICACION']);
                array_push($publicaciones,$objPublicacion);
            }
            $datos = ['publicaciones' => $publicaciones, 'total' => $total_paginas];
            return $datos;
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage();
            return false;
        }
    }
 
}
?>