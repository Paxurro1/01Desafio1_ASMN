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
        <div class="s-col-8 m-col-8 l-col-8 offset-by-1">
            <?php
            require_once 'Persona.php';
            require_once 'Conexion.php';
            $personas = Conexion::getPersonas();
            echo '<table class="table1">
                        <tr>
                            <th>email</th>
                            <th>usuario</th>
                            <th>pass</th>
                            <th>foto</th>
                            <th>activo</th>
                            <th>eliminar</th>
                            <th>editar</th>
                        </tr>';
            foreach ($personas as $ele) {
                echo '<tr><form class="form1" action="controlador.php" method="post">' . $ele->__toString();
                echo '<td><input type="submit" name="borrar" value="X"></td>';
                echo '<td><input type="submit" name="editar" value="edit"></td>';
                echo '</form></tr>';
            }
            echo '</table>';
            ?>
        </div>
    </div>
</body>

</html>