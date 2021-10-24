<?php
require_once 'Constantes.php';
require_once 'Persona.php';
class Conexion
{
    private static $conexion;
    public static function abrirConexion()
    {
        self::$conexion = mysqli_connect(Constantes::$HOST, Constantes::$USUARIO, Constantes::$PASS, Constantes::$BBDD);
        //print "Conexión realizada de forma procedimental: " . mysqli_get_server_info(self::$conexion) . "<br/>";

        /*
        if (mysqli_connect_errno(self::$conexion)) {
            print "Fallo al conectar a MySQL: " . mysqli_connect_error();
        }
        */
    }

    public static function cerrarConexion()
    {
        mysqli_close(self::$conexion);
        unset($conexion);
    }

    public static function addPersona($p)
    {
        self::abrirConexion();
        $query = "INSERT INTO jugador (email, usuario, pass, foto, activo) VALUES ('" . $p->getEmail() . "','" . $p->getUsuario() . "','" . $p->getPass() . "','" . $p->getFoto() . "','" . $p->getActivo() . "')";
        if (mysqli_query(self::$conexion, $query)) {
        } else {
            $fallo = "Error al insertar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function borrarPersona($email)
    {
        self::abrirConexion();
        $query = "DELETE FROM jugador WHERE email = '$email'";
        echo $query;
        if (mysqli_query(self::$conexion, $query)) {
        } else {
            $fallo = "Error al borrar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function editarPersona($email, $usuario, $activo)
    {
        self::abrirConexion();
        $query = "UPDATE jugador SET email = '$email', usuario = '$usuario', activo = '$activo' WHERE email = '$email'";
        if (mysqli_query(self::$conexion, $query)) {
        } else {
            $fallo = "Error al editar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function getPersona($email, $pass)
    {
        self::abrirConexion();
        $jugador = null;
        $consulta = "SELECT * FROM jugador WHERE email = '$email' AND pass = '$pass'";
        $resultado = mysqli_query(self::$conexion, $consulta);
        if ($resultado) {
            while ($fila = mysqli_fetch_array($resultado)) {
                $jugador = new Persona($fila["email"], $fila["usuario"], $fila["pass"], $fila["foto"], $fila["activo"], $fila['victorias']);
            }
        }
        self::cerrarConexion();
        return $jugador;
    }

    public static function getPersonas()
    {
        self::abrirConexion();
        $consulta = "SELECT * FROM jugador";
        if ($resultado = mysqli_query(self::$conexion, $consulta)) {
            $jugadores = [];
            while ($fila = mysqli_fetch_array($resultado)) {
                $p = new Persona($fila["email"], $fila["usuario"], $fila["pass"], $fila["foto"], $fila["activo"], $fila['victorias']);
                $jugadores[$p->getEmail()] = $p;
            }
        } else {
        }
        self::cerrarConexion();
        return $jugadores;
    }
}