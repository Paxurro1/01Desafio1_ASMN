<?php
require_once 'Persona.php';
require_once 'Conexion.php';
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
            header("Location:menu.php");
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
        $p = new Persona($_REQUEST['email'], $_REQUEST['usuario'], $_REQUEST['pass'], null, 1, 0);
        Conexion::addPersona($p);
        header("Location:registro.php");
    } else {
        header("Location:registro.php");
    }
}
// BORRADO
if (isset($_REQUEST['borrar'])) {
    Conexion::borrarPersona($_REQUEST['email']);
    header("Location:crud.php");
}
// EDITAR
if (isset($_REQUEST['editar'])) {
    Conexion::editarPersona($_REQUEST['email'], $_REQUEST['usuario'], $_REQUEST['activo']);
    header("Location:crud.php");
}
