<?php


class crear_publicacionModel extends Model{

    public function __construct(){
        parent::__construct();

    }

    public function insert($datos){
        //insertar datos en la bbdd
        //set_time_limit(0);

        try{
            $query= $this->db->connect()->prepare("INSERT INTO mascota (ID_USUARIO, NOMBRE_MASCOTA, ID_SEXO_MASCOTA, ID_EDAD_MASCOTA, ID_TAMANIO_MASCOTA, DESCRIPCION_MASCOTA, ID_ESTADO_MASCOTA, ID_LOCALIDAD, ID_TIPO_MASCOTA, NUM_CONTACTO_MASCOTA, FECHA_PUBLICADO,FOTO_MASCOTA) VALUES (:usuario, :nombre, :sexo, :edad, :tamanio, :descripcion, :estado, :localidad, :tipo, :telefono, :fecha_publicado ,:foto)");
            var_dump($datos);
            if($query->execute(['usuario' => $datos['usuario'],'nombre' => $datos['nombre'],'sexo' => $datos['sexo'],'edad' => $datos['edad'],'tamanio' => $datos['tamanio'],'descripcion' => $datos['descripcion'],'estado' => $datos['estado'],'localidad' => $datos['localidad'],'tipo' => $datos['tipo'],'telefono' => $datos['telefono'],'fecha_publicado' => $datos['fecha_publicado'],'foto'=>$datos['foto']]))
            return true;

        }catch(PDOException $exp){
            echo $exp."Error al generar la publicación en la base de datos.";
            return false;
        }
 
    }

    


}



?>