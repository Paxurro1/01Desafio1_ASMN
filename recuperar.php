<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva contraseña</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <header class="row cabecera1">
        <div class="s-col-12 m-col-12 l-col-12">
            <h1>ATAKEBUNE</h1>
        </div>
    </header>
    <div class="row">
    <div class="s-col-4 m-col-4 l-col-4 offset-by-4">
            <form action="controlador.php" method="post" class="form1" id="formulario_recuperar">
                <div class="row">
                    <label class="s-col-6 m-col-6 l-col-6" for="email">Introduce tu email</label>
                    <input class="s-col-6 m-col-6 l-col-6" type="email" name="correoDestino" id="" required minlength="5">
                </div>
                <div class="row">
                    <div class="s-col-12 m-col-12 l-col-12">
                        <input type="submit" value="Generar nueva contraseña" name="nuevapass">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>