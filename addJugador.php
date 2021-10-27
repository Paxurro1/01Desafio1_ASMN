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
    <?php
    session_start();
    ?>
    <header class="row cabecera1">
        <div class="s-col-12 m-col-12 l-col-12">
            <h1>ATAKEBUNE</h1>
        </div>
    </header>
    <div class="row">
        <div class="s-col-12 m-col-12 l-col-12 nav-horizontal">
            <ul>
                <li><a href="menu.php">Menu</a></li>
                <?php
                require_once 'Persona.php';
                session_start();
                $p = $_SESSION['jugador'];
                if ($p->getRol() == 2 || $p->getRol() == 3) {
                ?>
                    <li><a href="preguntas.php">Crear pregunta</a></li>
                    <li><a href="crudpreguntas.php">Editar pregunta</a></li>
                <?php
                }
                if ($p->getRol() == 3) {
                ?>
                    <li><a href="crud.php">Admin usuarios</a></li>
                <?php
                }
                ?>
                <li><a href="index.php">Cerrar</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="s-col-4 m-col-4 l-col-4 offset-by-4">
            <form action="controlador.php" method="post" class="form1">
                <div class="row">
                    <label class="s-col-6 m-col-6 l-col-6" for="usuario">Usuario</label>
                    <input class="s-col-6 m-col-6 l-col-6" type="text" name="usuario" id="usuario" required minlength="3">
                </div>
                <div class="row">
                    <label class="s-col-6 m-col-6 l-col-6" for="email">Email</label>
                    <input class="s-col-6 m-col-6 l-col-6" type="email" name="email" id="email" required minlength="5">
                </div>
                <div class="row">
                    <label class="s-col-6 m-col-6 l-col-6" for="pass">Contraseña</label>
                    <input class="s-col-6 m-col-6 l-col-6" type="password" name="pass" id="pass" required minlength="5">
                </div>
                <div class="row">
                    <label class="s-col-6 m-col-6 l-col-6" for="pass">Repite la contraseña</label>
                    <input class="s-col-6 m-col-6 l-col-6" type="password" name="pass" id="pass" required minlength="5">
                </div>
                <div class="row">
                    <input class="s-col-1 m-col-1 l-col-1" type="radio" name="rol" id="" value="1" checked>
                    <label class="s-col-6 m-col-6 l-col-6" for="jugador">Jugador</label>
                </div>
                <div class="row">
                    <input class="s-col-1 m-col-1 l-col-1" type="radio" name="rol" id="" value="2">
                    <label class="s-col-6 m-col-6 l-col-6" for="editor">Editor</label>
                </div>
                <div class="row">
                    <input class="s-col-1 m-col-1 l-col-1" type="radio" name="rol" id="" value="3">
                    <label class="s-col-6 m-col-6 l-col-6" for="admin">Admin</label>
                </div>
                <div class="row">
                    <div class="s-col-12 m-col-12 l-col-12">
                        <input type="submit" value="Registrarme" name="addJugador">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="s-col-3 m-col-3 l-col-3 offset-by-5">
                <button class="button_1" onclick="window.location.href='crud.php'">volver</button>
        </div>
    </div>
</body>

</html>