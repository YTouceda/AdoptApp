<?php
include_once 'Clases/usuario.php';
include_once 'Libs/model.php';
class usuarioModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function getUsuario($Id){
        try {
            $permisos = [];
            $query = $this->db->connect()->prepare("SELECT * FROM V_USUARIO WHERE ID_USUARIO = ".$Id);
            //$query->bindParam(':ID_USUARIO', $Id);
            $query->execute();
            // die(var_dump($query));
            $item = [];
            while($fila = $query->fetch()){
                $permiso = $fila['PERMISOS'];
                array_push($permisos,$permiso);
                // die(var_dump($fila['ID_USUARIO']));
                $item=[
                    'ID_USUARIO' => $fila['ID_USUARIO'],
                    'ESTADO_BLOQUEO' => $fila['ESTADO_BLOQUEO'],
                    'NOMBRE_ROL' => $fila['NOMBRE_ROL'],
                    'NOMBRE_USUARIO' => $fila['NOMBRE_USUARIO'],
                    'NUM_CONTACTO_USUARIO' => $fila['NUM_CONTACTO_USUARIO'],
                    'EMAIL_USUARIO' => $fila['EMAIL_USUARIO'],
                    'FOTO_PERFIL' => $fila['FOTO_PERFIL'],
                    'PERMISOS' => $permisos,
                ];
            }
            // die(var_dump($item));
            return $item;
        } catch (PDOException $exc) {
            return false;
        }
    }
}
?>