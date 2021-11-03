<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
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
        <div class="s-col-12 m-col-12 l-col-12">
            <?php
            require_once 'Persona.php';
            require_once 'Conexion.php';
            $personas = Conexion::getPersonas();
            echo '<div class="row">';
            foreach ($personas as $ele) {
                echo '<div class="s-col-12 m-col-6 l-col-4">';
                echo '<form class="form1" action="controlador.php" method="post">' . $ele->__toString();
                echo '<div class="row">';
                echo '<div class="s-col-6 m-col-6 l-col-6">';
                echo '<input type="submit" name="editar" value="edit">';
                echo '</div>';
                echo '<div class="s-col-6 m-col-6 l-col-6">';
                echo '<input type="submit" name="borrar" value="X">';
                echo '</div>';
                echo '</div>';
                echo '</form>';
                echo '</div>';
            }
            echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="s-col-2 m-col-2 l-col-2 offset-by-5">
            <button class="button_2" onclick="window.location.href='addJugador.php'">Añadir persona</button>
        </div>
    </div>
</body>
</html>