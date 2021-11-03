<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
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
                <li><a href="ranking.php">Ranking</a></li>
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
        <div class="s-col-4 m-col-4 l-col-4 offset-by-4">
            <div class="row">
                <button class="button_1 s-col-12 m-col-12 l-col-12">Unirme a una partida</button>
            </div>
            <div class="row">
                <button class="button_1 s-col-12 m-col-12 l-col-12">Crear una sala</button>
            </div>
            <div class="row">
                    <button class="button_1 s-col-12 m-col-12 l-col-12" onclick="window.location.href='ranking.php'">Ranking</button>
                </div>
            <?php
            if ($p->getRol() == 2 || $p->getRol() == 3) {
            ?>
                <div class="row">
                    <button class="button_1 s-col-12 m-col-12 l-col-12" onclick="window.location.href='preguntas.php'">Crear pregunta</button>
                </div>
                <div class="row">
                    <button class="button_1 s-col-12 m-col-12 l-col-12" onclick="window.location.href='crudpreguntas.php'">Editar preguntas</button>
                </div>
            <?php
            }
            if ($p->getRol() == 3) {
            ?>
                <div class="row">
                    <button class="button_1 s-col-12 m-col-12 l-col-12" onclick="window.location.href='crudusuarios.php'">Editar jugadores</button>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>