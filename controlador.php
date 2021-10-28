<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once 'Persona.php';
require_once 'Conexion.php';
require_once 'Pregunta.php';
require_once 'Respuesta.php';
require_once 'phpmailer/src/Exception.php';
require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';
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
        $p = new Persona($_REQUEST['email'], $_REQUEST['usuario'], $_REQUEST['pass'], null, 0, 0, 1);
        Conexion::addPersona($p);
        $emailDestino = $_REQUEST['email'];
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'auxiliardaw2@gmail.com';
        $mail->Password = 'Chubaca20';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('AuxiliarDAW2@gmail.com');
        $mail->addAddress($emailDestino);

        $mail->isHTML(true);
        $mail->Subject = 'Confirmar correo';
        $mail->Body = 'localhost/01Desafio_ASMN/activar.php?email=' . $emailDestino;
        $mail->send();
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
    header("Location:crudusuarios.php");
}
// EDITAR
if (isset($_REQUEST['editar'])) {
    Conexion::editarPersona($_REQUEST['email'], $_REQUEST['usuario'], $_REQUEST['activo'], $_REQUEST['rol']);
    header("Location:crudusuarios.php");
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
    $p = Conexion::getPreguntaTexto($p);
    $respuesta = new Respuesta(null, $p->getId_pregunta(), $_REQUEST['respuesta1']);
    Conexion::addRespuesta($respuesta);
    $respuesta = new Respuesta(null, $p->getId_pregunta(), $_REQUEST['respuesta2']);
    Conexion::addRespuesta($respuesta);
    $respuesta = new Respuesta(null, $p->getId_pregunta(), $_REQUEST['respuesta3']);
    Conexion::addRespuesta($respuesta);
    $respuesta = new Respuesta(null, $p->getId_pregunta(), $_REQUEST['respuesta4']);
    Conexion::addRespuesta($respuesta);
    header("Location:preguntas.php");
}
//BORRAR PREGUNTA Y RESPUESTAS
if (isset($_REQUEST['borrar_pregunta'])) {
    Conexion::borrarPregunta($_REQUEST['id_pregunta']);
    Conexion::borrarRespuestas($_REQUEST['id_pregunta']);
    header("Location:crudpreguntas.php");
}
//EDITAR PREGUNTA Y RESPUESTAS
if (isset($_REQUEST['editar_pregunta'])) {
    if ($_REQUEST['verdadera'] == 1) {
        $respuesta = $_REQUEST['9'];
        //El primer campo es el id de la preunta, el segundo la misma preunta y el 3 su correspondiente solución
        Conexion::editarPregunta($_REQUEST['id_pregunta'], $_REQUEST['pregunta'], $respuesta);
    } else if ($_REQUEST['verdadera'] == 2) {
        $respuesta = $_REQUEST['10'];
        Conexion::editarPregunta($_REQUEST['id_pregunta'], $_REQUEST['pregunta'], $respuesta);
    } else if ($_REQUEST['verdadera'] == 3) {
        $respuesta = $_REQUEST['11'];
        Conexion::editarPregunta($_REQUEST['id_pregunta'], $_REQUEST['pregunta'], $respuesta);
    } else if ($_REQUEST['verdadera'] == 4) {
        $respuesta = $_REQUEST['12'];
        Conexion::editarPregunta($_REQUEST['id_pregunta'], $_REQUEST['pregunta'], $respuesta);
    } else {
        //Hago esto por si no se ha seleccionado ninguna respuesta ponerle la que ya tenía antes
        $preg = Conexion::getPreguntaId($_REQUEST['id_pregunta']);
        Conexion::editarPregunta($_REQUEST['id_pregunta'], $_REQUEST['pregunta'], $preg->getRespuesta());
    }
    //El primer campo es el id de la respuesta, el segundo es el contenido de la misma respuesta
    Conexion::editarRespuesta($_REQUEST['5'], $_REQUEST['9']);
    Conexion::editarRespuesta($_REQUEST['6'], $_REQUEST['10']);
    Conexion::editarRespuesta($_REQUEST['7'], $_REQUEST['11']);
    Conexion::editarRespuesta($_REQUEST['8'], $_REQUEST['12']);
    header("Location:crudpreguntas.php");
}
//NUEVA CONTRASEÑA
if (isset($_REQUEST['nuevapass'])) {
    $jugador = Conexion::getPersonaEmail($_REQUEST['correoDestino']);
    if ($jugador != null) {
        $emailDestino = $_REQUEST['correoDestino'];
        switch (rand(1, 4)) {
            case 1:
                $pass = 'Firulais_' . rand(1000, 9999);
                break;
            case 2:
                $pass = 'Estopa_' . rand(1000, 9999);
                break;
            case 3:
                $pass = 'IlloJuan_' . rand(1000, 9999);
                break;
            case 4:
                $pass = 'Knekro_' . rand(1000, 9999);
                break;
        }
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'auxiliardaw2@gmail.com';
        $mail->Password = 'Chubaca20';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('AuxiliarDAW2@gmail.com');
        $mail->addAddress($emailDestino);

        $mail->isHTML(true);
        $mail->Subject = 'Nueva contraseña';
        $mail->Body = 'Tu nueva contraseña es: ' . $pass;
        $mail->send();
        Conexion::cambiarPass($emailDestino, $pass);
        header("Location:index.php");
    } else {
        header("Location:recuperar.php");
    }
}
