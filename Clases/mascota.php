<?php
class Mascota{
     private $id_mascota;
     private $sexo_mascota;
     private $edad_mascota;
     private $tamanio_mascota;
     private $especie_mascota;
     private $nombre_mascota;
     private $descripcion_mascota;
     private $fotos_mascota;
     
     public function getId_mascota(){
          return $this->id_mascota;
     }
     public function getSexo_mascota(){
          return $this->sexo_mascota;
     }
     public function getEdad_mascota(){
          return $this->edad_mascota;
     }
     public function getTamanio_mascota(){
          return $this->tamanio_mascota;
     }
     public function getEspecie_mascota(){
          return $this->especie_mascota;
     }
     public function getNombre_mascota(){
          return $this->nombre_mascota;
     }
     public function getDescripcion_mascota(){
          return $this->descripcion_mascota;
     }
     public function getFotos_mascota(){
          return $this->fotos_mascota;
     }
     public function setId_mascota($id){
          $this->id_mascota = $id;
     }
     public function setSexo_mascota($sexo){
          $this->sexo_mascota = $sexo;
     }
     public function setEdad_mascota($edad){
          $this->edad_mascota = $edad;
     }
     public function setTamanio_mascota($tamanio){
          $this->tamanio_mascota = $tamanio;
     }
     public function setEspecie_mascota($especie){
          $this->especie_mascota = $especie;
     }
     public function setNombre_mascota($nombre){
          $this->nombre_mascota = $nombre;
     }
     public function setDescripcion_mascota($descripcion){
          $this->descripcion_mascota = $descripcion;
     }
     public function setFotos_mascota($fotos){
          $this->fotos_mascota = $fotos;
     }
}
?>