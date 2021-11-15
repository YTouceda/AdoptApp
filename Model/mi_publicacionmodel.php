<?php

// include_once 'Clases/publicacion.php';

// class mi_publicacionModel extends Model{
//     public function __construct(){
//         parent::__construct();
//     }
//     function time_passed($fechaCreacion){
        
        
//         $timestamp = strtotime($fechaCreacion);
//         $diff = time() - (int)$timestamp;

//         if ($diff == 0) 
//             return 'justo ahora';

//         // if ($diff > 604800)
//         //     return date("d M Y",$timestamp);

//         $intervals = array
//         (
//                 1                   => array('año',    31556926),
//             $diff < 31556926    => array('mes',   2628000),
//             $diff < 2629744     => array('semana',    604800),
//             $diff < 604800      => array('día',     86400),
//             $diff < 86400       => array('hora',    3600),
//             $diff < 3600        => array('minuto',  60),
//             $diff < 60          => array('segundo',  1)
//         );
        
//         $aux = "";
        
//         if($intervals[1][0] == "mes"){
//             if (floor($diff/$intervals[1][1]) > 1) {
//                 $aux = $intervals[1][0].'es';
//             }else{
//                 $aux = $intervals[1][0];
//             }
//         }else{
//             if (floor($diff/$intervals[1][1]) > 1) {
//                 $aux = $intervals[1][0].'s';
//             }
//             else{
//                 $aux = $intervals[1][0];
//             }
//         }

//         $value = floor($diff/$intervals[1][1]);
//         $devuelto ='hace '.$value.' '.$aux;
        
//         return $devuelto;
        

//     }

//     public function get($publicacion){
//         $items = [];
//         try {
//             $query = $this->db->connect()->prepare("SELECT * FROM `V_PUBLICACION` WHERE ID_PUBLICACION=:ID_PUBLICACION");
//             $query->execute(['ID_PUBLICACION' => $publicacion]);
//             while($row = $query->fetch()){
//                 $objPublicacion = new Publicacion();
//                 $objMascota= new Mascota();
//                 $objPublicacion->setId_usuario($row['ID_USUARIO']);
//                 $objPublicacion->setId_publicacion($row['ID_PUBLICACION']);
//                 $objPublicacion->setEstado($row['ESTADO_PUBLICACION']);
//                 $objMascota->setSexo_mascota($row['SEXO_MASCOTA']);
//                 $objMascota->setEdad_mascota($row['EDAD_MASCOTA']);
//                 $objMascota->setTamanio_mascota($row['TAMANIO_MASCOTA']);
//                 $objPublicacion->setLocalidad($row['PROVINCIA']);
//                 $objPublicacion->setProvincia($row['LOCALIDAD']);
//                 $objMascota->setEspecie_mascota($row['TIPO_ESPECIE_MASCOTA']);
//                 $objMascota->setNombre_mascota($row['NOMBRE_MASCOTA']);
//                 $objMascota->setDescripcion_mascota($row['DESCRIPCION_MASCOTA']);
//                 $objMascota->setFotos_mascota($row['FOTO_MASCOTA']);
//                 $objPublicacion->setNum_contacto_publicacion($row['NUM_CONTACTO_PUBLICACION']);
//                 $objPublicacion->setFecha_alta_publicacion($this->time_passed($row['FECHA_ALTA_PUBLICACION']));
//                 $objPublicacion->setMascota($objMascota);
//             }
//             return $objPublicacion;
//         } catch (PDOException $exc) {
//             return false;
//         }
        
//     }
//     public function getPostulaciones($ID_PUBLICACION){
//         $items = [];
//         try {
//             $query = $this->db->connect()->prepare("SELECT * FROM POSTULACION WHERE ID_PUBLICACION = :ID_PUBLICACION");
//             $query->execute(['ID_PUBLICACION' => $ID_PUBLICACION]);
//             while($row = $query->fetch()){
//                 $user= new Usuario();
//                 $user->setUsuario($row['ID_USUARIO_POSTULADO']);
//                 $item=[
//                     'POSTULACION' => $row['ID_POSTULACION'],
//                     'PUBLICACION' => $row['ID_PUBLICACION'],
//                     'USUARIO_POSTULADO' => $user
//                 ];
//                 array_push($items,$item);
//             }
//             return $items;
//         } catch (PDOException $exc) {
//             return false;
//         }
//     }

// }

?>