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
    <?php
    require_once 'Persona.php';
    session_start();
    $p = $_SESSION['jugador'];
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
                <li><a href="ranking.php">Ranking</a></li>
                <li><a href="conectados.php">Usuarios Conectados</a></li>
                <?php
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
        <div class="s-col-8 m-col-8 l-col-8 soffset-by-2 moffset-by-2 loffset-by-2">
            <div class="row menu">
                <div class="s-col-12 m-col-12 l-col-12">
                    <div class="row">
                        <div class="s-col-12 m-col-12 l-col-12">
                            <h2>Partidas activas</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="s-col-12 m-col-12 l-col-12">
                            <?php
                            require_once 'Conexion.php';
                            require_once 'Partida.php';
                            $jugador = $_SESSION['jugador'];
                            $partidas = Conexion::getPartida($jugador->getId_partida());
                            echo '<div class="row">';
                            echo '<div class="s-col-12 m-col-12 l-col-12">';
                            echo '<form class="form1" action="controlador.php" method="post">' . $_SESSION['partida']->__toString();
                            echo '<div class="row">';
                            echo '<div class="s-col-12 m-col-12 l-col-12">';
                            echo '<input type="submit" name="unirme" value="Unirme">';
                            echo '</div>';
                            echo '</div>';
                            echo '</form>';
                            echo '</div>';
                            echo '</div>';
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="s-col-12 m-col-12 l-col-12">
                            <h2>Crea tu partida</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="s-col-10 m-col-8 l-col-8 soffset-by-1 moffset-by-2 loffset-by-2">
                            <form action="controlador.php" method="post" class="form1">
                                <div class="row">
                                    <div class="s-col-12 m-col-12 l-col-12">
                                        <input type="submit" value="Crear partida" name="crear_partida">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>