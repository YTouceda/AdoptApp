<?php
include_once 'Clases/usuario.php';
include_once 'Libs/model.php';
class usuarioModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function getUsuario($Id){
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM V_USUARIO WHERE ID_USUARIO = ".$Id);
            //$query->bindParam(':ID_USUARIO', $Id);
            $query->execute();
            $row = $query->fetch();
            $item=[
                'ID_USUARIO' => $row['ID_USUARIO'],
                'NOMBRE_PERMISO' => $row['NOMBRE_PERMISO'],
                'NOMBRE_USUARIO' => $row['NOMBRE_USUARIO'],
                'NUM_CONTACTO_USUARIO' => $row['NUM_CONTACTO_USUARIO'],
                'EMAIL_USUARIO' => $row['EMAIL_USUARIO'],
                'FOTO_PERFIL' => $row['FOTO_PERFIL']
            ];
            return $item;
        } catch (PDOException $exc) {
            return false;
        }
    }
}
?>