<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src='https://www.google.com/recaptcha/api.js?render=6LebEPEcAAAAANcqC4TpmZCeMAww49Vo13jntCJp'></script>
    <script src="js/captchaIndex.js"></script>
    <script src="js/validacion.js"></script>
</head>

<body>
    <?php
    require_once 'Persona.php';
    require_once 'Conexion.php';
    Conexion::activarJugador($_REQUEST['email']);
    ?>
    <header class="row cabecera1">
        <div class="s-col-12 m-col-12 l-col-12">
            <h1>ATAKEBUNE</h1>
        </div>
    </header>
    <div class="row cabecera1">
        <div class="s-col-12 m-col-12 l-col-12">
            <h2>Cuenta activada</h2>
        </div>
        <div class="s-col-3 m-col-3 l-col-3 offset-by-5">
            <a href="index.php">Ir al loging</a>
        </div>
    </div>

</body>

</html>