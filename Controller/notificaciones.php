<?php 
use Componere\Value;

class notificaciones extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->notificaciones = [];
        $this->view->usuario=new Usuario();
    }
    
    function Render(){
        $this->view->usuario->setUsuario($this->userSession->getCurrentUsuario());
        $this->view->notificaciones = $this->model->get($_SESSION['id']);
        if(!empty($this->view->notificaciones)){
            $this->view->notificaciones = ordNotificaciones($this->view->notificaciones);
            foreach($this->view->notificaciones as $row){
                $row->setFecha(time_passed($row->getFecha()));
            }
        }
        $this->view->render('notificaciones');
    }
    function cambiarEstado(){
        echo $this->model->set($_GET['id'],$_GET['cambio']);
    }
}


function ordNotificaciones($notificaciones) {
    
    if (sizeof($notificaciones) < 1) {
        return [];
    }
    $left = [];
    $right = [];
    $pivot = [];
    $pivot[0] = $notificaciones[0];
    
    for ($i = 1; $i < sizeof($notificaciones); $i++) {
        if (strtotime($notificaciones[$i]->getFecha()) > strtotime($pivot[0]->getFecha())) {
            array_push($left,$notificaciones[$i]);
        }
        else {
            array_push($right,$notificaciones[$i]);
        }
    }

    return array_merge(ordNotificaciones($left), $pivot, ordNotificaciones($right));

}

// esta funcion pasa una fecha de tipo datetime a un string mas amigable para el usuario ej: "hace 1 año, hace 2 semanas, justo ahora"
function time_passed($get_timestamp)
{
    date_default_timezone_set ('America/Argentina/Buenos_Aires');
    $timestamp = strtotime($get_timestamp);
    // echo date("Y-m-d H:i:s");
    $diff = (int)strtotime(date("Y-m-d H:i:s")) - (int)$timestamp;
    if ($diff == 0) 
        return 'justo ahora';

    // if ($diff > 604800)
    //     return date("d M Y",$timestamp);

    $intervals = array
    (
            1               => array('año',    31556926),
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
    return 'hace '.$value.' '.$aux;
}

?>