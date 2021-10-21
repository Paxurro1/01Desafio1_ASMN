<?php
require_once 'Persona.php';
require_once 'Conexion.php';
// EL LOGGING
if(isset($_REQUEST['logging_index'])){
    $jugador = Conexion::getPersona($_REQUEST['email'], $_REQUEST['pass']);
    if($jugador == null){
        header("Location:index.php");
    }else{
        header("Location:construccion.html");
    }
}
// EL REGISTRO
if(isset($_REQUEST['registro'])){
    $p = new Persona($_REQUEST['email'], $_REQUEST['usuario'], $_REQUEST['pass'], null);
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
    Conexion::editarPersona($_REQUEST['email'], $_REQUEST['usuario'], $_REQUEST['pass'], $_REQUEST['foto'], $_REQUEST['activo']);
    header("Location:crud.php");
}