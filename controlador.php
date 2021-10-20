<?php
require_once 'Persona.php';
require_once 'Conexion.php';
/* EL LOGGING */
if(isset($_REQUEST['logging_index'])){
    $jugador = Conexion::getPersona($_REQUEST['email'], $_REQUEST['pass']);
    if($jugador == null){
        header("Location:index.html");
    }else{
        header("Location:construccion.html");
    }
}
/* EL REGISTRO */
if(isset($_REQUEST['registro'])){
    $p = new Persona($_REQUEST['email'], $_REQUEST['usuario'], $_REQUEST['pass'], null);
    Conexion::addPersona($p);
    //header("Location:index.html");
}