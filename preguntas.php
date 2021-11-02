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

<body>
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
                    <li><a href="crudusuarios.php">Admin usuarios</a></li>
                <?php
                }
                ?>
                <li><a href="controlador.php?cerrar_sesion">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="s-col-8 m-col-6 l-col-6 soffset-by-2 moffset-by-3 loffset-by-3">
            <form action="controlador.php" method="post" class="form1">
                <div class="row">
                    <label class="s-col-12 m-col-12 l-col-12" for="pregunta">Pregunta</label>
                    <textarea class="s-col-12 m-col-12 l-col-12" name="pregunta" id="" cols="30" rows="10" maxlength="200"></textarea>
                </div>
                <div class="row">
                    <div class="s-col-12 m-col-12 l-col-12">
                        <div class="row">
                            <label class="s-col-12 m-col-12 l-col-12" for="respuesta1">Respuesta 1</label>
                            <input class="s-col-10 m-col-10 l-col-10" type="text" name="respuesta1" id="">
                            <input type="radio" name="respuesta" id="" value="1" class="s-col-1 m-col-1 l-col-1" checked>
                        </div>
                    </div>
                    <div class="s-col-12 m-col-12 l-col-12">
                        <div class="row">
                            <label class="s-col-12 m-col-12 l-col-12" for="respuesta2">Respuesta 2</label>
                            <input class="s-col-10 m-col-10 l-col-10" type="text" name="respuesta2" id="">
                            <input type="radio" name="respuesta" id="" value="2" class="s-col-1 m-col-1 l-col-1">
                        </div>
                    </div>
                    <div class="s-col-12 m-col-12 l-col-12">
                        <div class="row">
                            <label class="s-col-12 m-col-12 l-col-12" for="respuesta3">Respuesta 3</label>
                            <input class="s-col-10 m-col-10 l-col-10" type="text" name="respuesta3" id="">
                            <input type="radio" name="respuesta" id="" value="3" class="s-col-1 m-col-1 l-col-1">
                        </div>
                    </div>
                    <div class="s-col-12 m-col-12 l-col-12">
                        <div class="row">
                            <label class="s-col-12 m-col-12 l-col-12" for="respuesta4">Respuesta 4</label>
                            <input class="s-col-10 m-col-10 l-col-10" type="text" name="respuesta4" id="">
                            <input type="radio" name="respuesta" id="" value="4" class="s-col-1 m-col-1 l-col-1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="s-col-12 m-col-12 l-col-12">
                        <input type="submit" value="Añadir pregunta" name="crear_pregunta">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="s-col-2 m-col-2 l-col-2 offset-by-3">
            <button class="button_2" onclick="window.location.href='crudpreguntas.php'">Volver al editro</button>
        </div>
        <div class="s-col-2 m-col-2 l-col-2 offset-by-3 moffset-by-1 loffset-by-1">
            <button class="button_2" onclick="window.location.href='menu.php'">Volver al menú</button>
        </div>
    </div>
</body>

</html>