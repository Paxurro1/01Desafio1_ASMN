<?php
require_once 'Persona.php';
require_once 'Conexion.php';
// EL LOGGING
if(isset($_REQUEST['logging_index'])){
    $jugador = Conexion::getPersona($_REQUEST['email'], $_REQUEST['pass']);
    if($jugador != null){
        header("Location:menu.php");
    }else{
        header("Location:index.php");
    }
}
// EL REGISTRO
if(isset($_REQUEST['registro'])){
    $p = new Persona($_REQUEST['email'], $_REQUEST['usuario'], $_REQUEST['pass'], null, 1, 0);
    Conexion::addPersona($p);
    header("Location:index.php");
}
// BORRADO
if(isset($_REQUEST['borrar'])){
    Conexion::borrarPersona($_REQUEST['email']);
    header("Location:crud.php");
}
// EDITAR
if(isset($_REQUEST['editar'])){
    Conexion::editarPersona($_REQUEST['email'], $_REQUEST['usuario'], $_REQUEST['activo']);
    header("Location:crud.php");
}