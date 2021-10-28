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

<body>º
    <header class="row cabecera1">
        <div class="s-col-12 m-col-12 l-col-12">
            <h1>ATAKEBUNE</h1>
        </div>
    </header>
    <div class="row">
        <?php
        require_once 'Persona.php';
        require_once 'Conexion.php';
        if (Conexion::getPersonaEmail($_REQUEST['email'] != null)) {
            Conexion::activarJugador($_REQUEST['email']);
        ?>
            <div class="">
                <div class="s-col-12 m-col-12 l-col-12">
                    <p>Tu cuenta ha sido activada correctamente</p>
                    <a href="index.php">Ir al loging</a>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="">
                <div class="s-col-12 m-col-12 l-col-12">
                    <p>Tu no ha sido activada</p>
                    <a href="index.php">Ir al loging</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>