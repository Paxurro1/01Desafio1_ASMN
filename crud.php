<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <script src="js/validacion.js"></script>
</head>
<body>
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
                    <th>eliminar</th>
                    <th>editar</th>
                </tr>';
        foreach ($personas as $ele) {
            echo '<tr><form class="form2" action="controlador.php" method="post">'. $ele->__toString();
            echo '<td><input type="submit" name="borrar" value="X"></td>';
            echo '<td><input type="submit" name="editar" value="edit"></td>';
            echo '</form></tr>';
        }
        echo '</table>';
    ?>
</body>
</html>