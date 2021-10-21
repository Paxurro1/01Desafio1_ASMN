<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/validacion.js"></script>
</head>
<body onload="validacion()">
    <header class="row">
        <div class="s-col-4 m-col-4 l-col-4">
            <p>Aquí irá el icono</p>
        </div>
        <div class="s-col-8 m-col-8 l-col-8">
            <h1>ATAKEBUNE</h1>
        </div>
    </header>
    <div class="row">
        <div class="s-col-5 m-col-5 l-col-5">
            <form action="controlador.php" method="post" class="form1">
                <div class="row">
                    <div class="s-col-12 m-col-12 l-col-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="">
                    </div>
                    <div class="s-col-12 m-col-12 l-col-12">
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass" id="">
                    </div>
                    <div class="s-col-12 m-col-12 l-col-12">
                        <input type="submit" value="Logging" name="logging_index">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <a href="">Recuperar contraseña</a>
    <a href="registro.php">Registrarme</a>
</body>
</html>