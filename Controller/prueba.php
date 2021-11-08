<?php

Class Prueba extends Controller{
    function __construct(){
        parent::__construct();

    }

    function Render(){
        $filtros = 'WHERE ESTADO_PUBLICACION = :ESTADO_PUBLICACION ';

        if(isset($_GET['provincia'])){
            $filtros = $filtros."AND ID_PROVINCIA = ".$_GET['provincia']." ";
            if(isset($_GET['localidad'])){
                $filtros = $filtros."AND ID_LOCALIDAD = ".$_GET['localidad']." ";
            }
        }
        if(isset($_GET['tipo_mascota'])){
            $filtros = $filtros."AND TIPO_ESPECIE_MASCOTA = ".$_GET['tipo_mascota']." ";
        }
        if(isset($_GET['tamanio_mascota'])){
            $filtros = $filtros."AND TAMANIO_MASCOTA = ".$_GET['tamanio_mascota']." ";
        }
        if(isset($_GET['sexo_mascota'])){
            $filtros = $filtros."AND SEXO_MASCOTA = ".$_GET['sexo_mascota']." ";
        }
        if(isset($_GET['edad_mascota'])){
            $filtros = $filtros."AND EDAD_MASCOTA = ".$_GET['edad_mascota']." ";
        }

        echo $filtros;
    }
    //ID_PUBLICACION, ID_USUARIO, NOMBRE_MASCOTA, DESCRIPCION_MASCOTA, FOTO_MASCOTA, NUM_CONTACTO_PUBLICACION, FECHA_ALTA_PUBLICACION, SEXO_MASCOTA, EDAD_MASCOTA, TAMANIO_MASCOTA, ESTADO_PUBLICACION, LOCALIDAD, PROVINCIA, TIPO_ESPECIE_MASCOTA
}

?>