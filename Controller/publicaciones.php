<?php

Class Publicaciones extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->publicacion = [];
        $this->view->usuario = new Usuario();

    }
    
    function Render(){
        $this->view->usuario->setUsuario($this->userSession->getCurrentUsuario());
        $extra_query = "";
        if(!isset($_GET['seccion'])){
            $seccion = 'En adopción';
        }else{
            $seccion = $_GET['seccion'];
        }
        $this->view->seccion = $seccion;
        $extra_query = "WHERE ESTADO_PUBLICACION = '".$seccion."' ";
        $query_values = [];
        if(isset($_GET['ID_PROVINCIA'])){
            $query_values += [
                'ID_PROVINCIA' => $_GET['ID_PROVINCIA'],
            ]; 
        }
        if(isset($_GET['ID_LOCALIDAD'])){
            $query_values += [
                'ID_LOCALIDAD' => $_GET['ID_LOCALIDAD']
            ]; 
        }
        if(isset($_GET['TIPO_ESPECIE_MASCOTA'])){
            $query_values += [
                'TIPO_ESPECIE_MASCOTA' => $_GET['TIPO_ESPECIE_MASCOTA']
            ]; 
        }
        if(isset($_GET['TAMANIO_MASCOTA'])){
            $query_values += [
                'TAMANIO_MASCOTA' => $_GET['TAMANIO_MASCOTA']
            ]; 
        }
        if(isset($_GET['SEXO_MASCOTA'])){
            $query_values += [
                'SEXO_MASCOTA' => $_GET['SEXO_MASCOTA']
            ]; 
        }
        if(isset($_GET['EDAD_MASCOTA'])){
            $query_values += [
                'EDAD_MASCOTA' => $_GET['EDAD_MASCOTA']
            ]; 
        }

        
        if($query_values){
            $extra_query.= " AND ";
            $values = [];
            $queries = [];
            
            foreach($query_values as $field_name => $field_value){
                foreach($field_value as $value){
                    $values[$field_name][] = " {$field_name} = '{$value}'";
                }
            }
            
            foreach($values as $field_name => $field_values){
                $queries[$field_name] = "(".implode(" OR ", $field_values).")";
            }
            
            $extra_query .= " ".implode(" AND ",$queries);
            
        }
        
        if(!isset($_GET['pagina'])){
            $pagina = 1;
        }else{
            $pagina = $_GET['pagina'];
        }
        $datos = $this->model->get($extra_query , $pagina);
        if(!empty($datos['items'])){
            $this->view->publicacion = $datos['items'];
            $this->view->total_paginas = $datos['total'];
            $this->view->pagina = $pagina;
            $this->view->render('publicaciones/index');
        }else{
            $this->view->render('publicaciones/index');
        }
    }
    
}

?>