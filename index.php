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
    session_start();
    $_SESSION['volver'] = 'index';
    ?>
    <header class="row cabecera1">
        <div class="s-col-12 m-col-12 l-col-12">
            <h1>ATAKEBUNE</h1>
        </div>
    </header>
    <div class="row">
        <div class="s-col-4 m-col-4 l-col-4 offset-by-4">
            <form action="controlador.php" method="post" class="form1" id="formulario_loging">
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                <div class="row">
                    <label class="s-col-6 m-col-6 l-col-6" for="email">Email</label>
                    <input class="s-col-6 m-col-6 l-col-6" type="email" name="email" id="" required minlength="5">
                </div>
                <div class="row">
                    <label class="s-col-6 m-col-6 l-col-6" for="pass">Contraseña</label>
                    <input class="s-col-6 m-col-6 l-col-6" type="password" name="pass" id="" required minlength="5">
                </div>
                <div class="row">
                    <div class="s-col-12 m-col-12 l-col-12">
                        <input type="submit" value="Logging" name="loging_index">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="s-col-3 m-col-3 l-col-3 offset-by-4">
            <a href="recuperar.php">Nueva contraseña</a>
        </div>
        <div class="s-col-2 m-col-2 l-col-2">
            <a href="registro.php">Registrarme</a>
        </div>
    </div>
</body>

</html>