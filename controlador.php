<?php
require_once 'Persona.php';
require_once 'Conexion.php';
session_start();
// EL LOGGING
if (isset($_REQUEST['loging_index'])) {
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LebEPEcAAAAAD4uTTwwtb2nEL4XsgQ8gc5DRIrt';
    $recaptcha_response = $_POST['recaptcha_response'];
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
    if ($recaptcha->score >= 0.7) {
        $jugador = Conexion::getPersona($_REQUEST['email'], $_REQUEST['pass']);
        if ($jugador != null) {
            if ($jugador->getActivo() == 1) {
                $_SESSION['jugador'] = $jugador;
                header("Location:menu.php");
            } else {
                header("Location:index.php");
            }
        } else {
            header("Location:index.php");
        }
    } else {
        header("Location:index.php");
    }
}
// EL REGISTRO
if (isset($_REQUEST['registro'])) {
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LebEPEcAAAAAD4uTTwwtb2nEL4XsgQ8gc5DRIrt';
    $recaptcha_response = $_POST['recaptcha_response'];
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
    if ($recaptcha->score >= 0.7) {
        $p = new Persona($_REQUEST['email'], $_REQUEST['usuario'], $_REQUEST['pass'], null, 1, 0, 1);
        Conexion::addPersona($p);
        header("Location:index.php");
    } else {
        header("Location:registro.php");
    }
}
// ADD USUARIO DESDE CRUD
if (isset($_REQUEST['addJugador'])) {
    $p = new Persona($_REQUEST['email'], $_REQUEST['usuario'], $_REQUEST['pass'], null, 1, 0, $_REQUEST['rol']);
    Conexion::addPersona($p);
    header("Location:addJugador.php");
}
// BORRADO
if (isset($_REQUEST['borrar'])) {
    Conexion::borrarPersona($_REQUEST['email']);
    header("Location:crud.php");
}
// EDITAR
if (isset($_REQUEST['editar'])) {
    Conexion::editarPersona($_REQUEST['email'], $_REQUEST['usuario'], $_REQUEST['activo'], $_REQUEST['rol']);
    header("Location:crud.php");
}
// AÑADIR PREGUNTA Y RESPUESTAS
if (isset($_REQUEST['crear_pregunta'])) {
    if ($_REQUEST['respuesta'] == 1) {
        $respuesta = $_REQUEST['respuesta1'];
    } else if ($_REQUEST['respuesta'] == 2) {
        $respuesta = $_REQUEST['respuesta2'];
    } else if ($_REQUEST['respuesta'] == 3) {
        $respuesta = $_REQUEST['respuesta3'];
    } else if ($_REQUEST['respuesta'] == 4) {
        $respuesta = $_REQUEST['respuesta4'];
    }
    $p = new Pregunta(null, $_REQUEST['pregunta'], $respuesta);
    Conexion::addPregunta($p);
    $p = Conexion::getPregunta($p);
    $respuesta = new Respuesta (null, $p->getId_pregunta(), $_REQUEST['respuesta1']);
    Conexion::addRespuesta($respuesta);
    $respuesta = new Respuesta (null, $p->getId_pregunta(), $_REQUEST['respuesta2']);
    Conexion::addRespuesta($respuesta);
    $respuesta = new Respuesta (null, $p->getId_pregunta(), $_REQUEST['respuesta3']);
    Conexion::addRespuesta($respuesta);
    $respuesta = new Respuesta (null, $p->getId_pregunta(), $_REQUEST['respuesta4']);
    Conexion::addRespuesta($respuesta);
    header("Location:preguntas.php");
}
//BORRAR PREGUNTA Y RESPUESTAS
if(isset($_REQUEST['borrar_pregunta'])){
    Conexion::
}