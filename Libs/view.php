<?php
class View{
    function __construct(){
    }
    function render($nombre){
        require 'View/' . $nombre . ".php";
    }
}
?>