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
    <header class="row cabecera1">
        <div class="s-col-12 m-col-12 l-col-12">
            <h1>ATAKEBUNE</h1>
        </div>
    </header>
    <div class="row">
        <div class="s-col-4 m-col-4 l-col-4 offset-by-4">
            <form action="controlador.php" method="post" class="form1" id="formu">
                    <div class="row">
                        <label class="s-col-6 m-col-6 l-col-6" for="email">Usuario</label>
                        <input class="s-col-6 m-col-6 l-col-6" type="text" name="usuario" id="usuario" required minlength="3">
                    </div>
                    <div class="row">
                        <label class="s-col-6 m-col-6 l-col-6" for="pass">Email</label>
                        <input class="s-col-6 m-col-6 l-col-6" type="email" name="email" id="email" required minlength="5">
                    </div>
                    <div class="row">
                        <label class="s-col-6 m-col-6 l-col-6" for="pass">Contraseña</label>
                        <input class="s-col-6 m-col-6 l-col-6" type="password" name="pass" id="pass" required minlength="5">
                    </div>
                    <div class="row">
                        <label class="s-col-6 m-col-6 l-col-6" for="pass">Contraseña</label>
                        <input class="s-col-6 m-col-6 l-col-6" type="password" name="pass" id="pass" required minlength="5">
                    </div>
                    <div class="row">
                        <div class="s-col-12 m-col-12 l-col-12">
                            <input type="submit" value="Registrarme" name="registro">
                        </div>
                    </div>
                    
            </form>
        </div>
    </div>
</body>

</html>