<?php

Class Adopciones extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->publicacion = [];

    }
    
    function Render(){
        $query_values = $_POST;
        $extra_query = "WHERE ESTADO_PUBLICACION = 'En adopción' ";
        
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
        
        
        if(!isset($_POST['pagina'])){
            $pagina = 1;
        }else{
            $pagina = $_POST['pagina'];
        }
        $datos = $this->model->get($extra_query , $pagina);
        if(!empty($datos['items'])){
            $this->view->publicacion = $datos['items'];
            $this->view->total_paginas = $datos['total'];
            $this->view->pagina = $pagina;
            $this->view->render('adopciones/index');
        }else{
            $this->view->render('adopciones/index');
        }
    }

}

?>