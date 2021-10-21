<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/validacion.js"></script>
</head>
<body>
    <div class="row">
        <div class="s-col-5 m-col-5 l-col-5">
            <form action="controlador.php" method="post" class="form1" id="formu">
                <div class="row">
                    <div class="s-col-12 m-col-12 l-col-12">
                        <label for="email">Usuario</label>
                        <input type="text" name="usuario" id="usuario" required minlength="3">
                    </div>
                    <div class="s-col-12 m-col-12 l-col-12">
                        <label for="pass">Email</label>
                        <input type="email" name="email" id="email" required minlength="5">
                    </div>
                    <div class="s-col-12 m-col-12 l-col-12">
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass" id="pass" required minlength="5">
                    </div>
                    <div class="s-col-12 m-col-12 l-col-12">
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass" id="pass" required minlength="5">
                    </div>
                    <div class="s-col-12 m-col-12 l-col-12">
                        <input type="submit" value="Registrarme" name="registro">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>