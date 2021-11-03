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
        <div class="s-col-12 m-col-12 l-col-12 nav-vertical">
            <div class="row">
                <div class="s-col-3 m-col-3 l-col-3 nav-vertical">
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
                <div class="s-col-9 m-col-9 l-col-9">
                    <?php
                    require_once 'Persona.php';
                    require_once 'Conexion.php';
                    $personas = Conexion::getRanking();
                    echo '<table class="table1">';
                    echo '<tr>';
                    echo '<th>Usuario</th>';
                    echo '<th>Victorias</th>';
                    echo '</tr>';
                    foreach ($personas as $ele) {
                        echo '<tr>';
                        echo '<td>'.$ele->getUsuario().'</td>';
                        echo '<td>'.$ele->getVictorias().'</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>