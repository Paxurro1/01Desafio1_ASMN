<?php
require_once 'Constantes.php';
require_once 'Persona.php';
require_once 'Pregunta.php';
require_once 'Respuesta.php';
require_once 'Partida.php';
require_once 'Participante.php';
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
        $fallo = 'No hay fallo';
        $query = "INSERT INTO jugador (email, usuario, pass, foto, activo, rol) VALUES ('" . $p->getEmail() . "','" . $p->getUsuario() . "','" . $p->getPass() . "','" . $p->getFoto() . "','" . $p->getActivo() . "','" . $p->getRol() . "')";
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
        $fallo = 'No hay fallo';
        $query = "DELETE FROM jugador WHERE email = '$email'";
        if (mysqli_query(self::$conexion, $query)) {
        } else {
            $fallo = "Error al borrar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function editarPersona($email, $usuario, $activo, $rol)
    {
        self::abrirConexion();
        $fallo = 'No hay fallo';
        $query = "UPDATE jugador SET usuario = '$usuario', activo = '$activo', rol = '$rol' WHERE email = '$email'";
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
        $consulta = "SELECT * FROM jugador WHERE email = ? AND pass = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $consulta)) {
            mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);
            while ($fila = mysqli_fetch_array($resultado)) {
                $jugador = new Persona($fila["email"], $fila["usuario"], $fila["pass"], $fila["foto"], $fila["activo"], $fila['victorias'], $fila['rol'], $fila['conectado']);
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
                $p = new Persona($fila["email"], $fila["usuario"], $fila["pass"], $fila["foto"], $fila["activo"], $fila['victorias'], $fila['rol'], $fila['conectado']);
                $jugadores[$p->getEmail()] = $p;
            }
        }
        self::cerrarConexion();
        return $jugadores;
    }

    public static function addPregunta($pregunta)
    {
        self::abrirConexion();
        $fallo = 'No hay fallo';
        $query = "INSERT INTO pregunta (id_pregunta, pregunta, respuesta) VALUES (null, ? , ?)";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "ss", $pregunta->getPregunta(), $pregunta->getRespuesta());
            mysqli_stmt_execute($stmt);
        } else {
            $fallo = "Error al insertar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function getPreguntaTexto($pregunta)
    {
        self::abrirConexion();
        $devolver = null;
        $query = "SELECT * FROM pregunta WHERE pregunta = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $pregunta->getPregunta());
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);
            while ($fila = mysqli_fetch_array($resultado)) {
                $devolver = new Pregunta($fila["id_pregunta"], $fila["pregunta"], $fila["respuesta"]);
            }
        } else {
            $fallo = "Error al obtener registro: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $devolver;
    }

    public static function addRespuesta($respuesta)
    {
        self::abrirConexion();
        $fallo = 'No hay fallo';
        $query = "INSERT INTO opciones (id_opcion, id_pregunta, respuesta) VALUES (null, ? , ?)";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "is", $respuesta->getId_pregunta(), $respuesta->getRespuesta());
            mysqli_stmt_execute($stmt);
        } else {
            $fallo = "Error al insertar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function getPreguntas()
    {
        self::abrirConexion();
        $query = "SELECT * FROM pregunta";
        if ($resultado = mysqli_query(self::$conexion, $query)) {
            $preguntas = [];
            while ($fila = mysqli_fetch_array($resultado)) {
                $p = new Pregunta($fila["id_pregunta"], $fila["pregunta"], $fila["respuesta"]);
                $preguntas[$p->getId_pregunta()] = $p;
            }
        }
        self::cerrarConexion();
        return $preguntas;
    }

    public static function getRespuestas($id)
    {
        self::abrirConexion();
        $query = "SELECT * FROM opciones WHERE id_pregunta = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);
            $respuestas = [];
            while ($fila = mysqli_fetch_array($resultado)) {
                $respuesta = new Respuesta($fila["id_opcion"], $fila["id_pregunta"], $fila["respuesta"]);
                $respuestas[$respuesta->getId_opcion()] = $respuesta;
            }
        }
        self::cerrarConexion();
        return $respuestas;
    }

    public static function borrarPregunta($id)
    {
        self::abrirConexion();
        $fallo = 'No hay fallo';
        $query = "DELETE FROM pregunta WHERE id_pregunta = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
        } else {
            $fallo = "Error al borrar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function borrarRespuestas($id)
    {
        self::abrirConexion();
        $fallo = 'No hay fallo';
        $query = "DELETE FROM opciones WHERE id_pregunta = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
        } else {
            $fallo = "Error al borrar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function editarPregunta($id, $pregunta, $respuesta)
    {
        self::abrirConexion();
        $fallo = 'No hay fallo';
        $query = "UPDATE pregunta SET pregunta = ?, respuesta = ? WHERE id_pregunta = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "ssi", $pregunta, $respuesta, $id);
            mysqli_stmt_execute($stmt);
        } else {
            $fallo = "Error al editar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function editarRespuesta($id, $respuesta)
    {
        self::abrirConexion();
        $fallo = 'No hay fallo';
        $query = "UPDATE opciones SET respuesta = ? WHERE id_opcion = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "si", $respuesta, $id);
            mysqli_stmt_execute($stmt);
        } else {
            $fallo = "Error al editar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function getPreguntaId($id)
    {
        self::abrirConexion();
        $devolver = null;
        $query = "SELECT * FROM pregunta WHERE id_pregunta = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);
            while ($fila = mysqli_fetch_array($resultado)) {
                $devolver = new Pregunta($fila["id_pregunta"], $fila["pregunta"], $fila["respuesta"]);
            }
        } else {
            $fallo = "Error al obtener registro: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $devolver;
    }

    public static function getPersonaEmail($email)
    {
        self::abrirConexion();
        $jugador = null;
        $consulta = "SELECT * FROM jugador WHERE email = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $consulta)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);
            while ($fila = mysqli_fetch_array($resultado)) {
                $jugador = new Persona($fila["email"], $fila["usuario"], $fila["pass"], $fila["foto"], $fila["activo"], $fila['victorias'], $fila['rol'], $fila['conectado']);
            }
        }
        self::cerrarConexion();
        return $jugador;
    }

    public static function cambiarPass($email, $pass)
    {
        self::abrirConexion();
        $fallo = 'No hay fallo';
        $query = "UPDATE jugador SET pass = ? WHERE email = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "ss", $pass, $email);
            mysqli_stmt_execute($stmt);
        } else {
            $fallo = "Error al editar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function activarJugador($email)
    {
        self::abrirConexion();
        $fallo = 'No hay fallo';
        $query = "UPDATE jugador SET activo = 1 WHERE email = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
        } else {
            $fallo = "Error al editar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function conectarJugador($email)
    {
        self::abrirConexion();
        $fallo = 'No hay fallo';
        $query = "UPDATE jugador SET conectado = 1 WHERE email = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
        } else {
            $fallo = "Error al conectar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function desconectarJugador($email)
    {
        self::abrirConexion();
        $fallo = 'No hay fallo';
        $query = "UPDATE jugador SET conectado = 0 WHERE email = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
        } else {
            $fallo = "Error al conectar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function getRanking()
    {
        self::abrirConexion();
        $consulta = "SELECT * FROM jugador ORDER BY victorias DESC";
        if ($resultado = mysqli_query(self::$conexion, $consulta)) {
            $jugadores = [];
            while ($fila = mysqli_fetch_array($resultado)) {
                $p = new Persona($fila["email"], $fila["usuario"], $fila["pass"], $fila["foto"], $fila["activo"], $fila['victorias'], $fila['rol'], $fila['conectado']);
                $jugadores[$p->getEmail()] = $p;
            }
        }
        self::cerrarConexion();
        return $jugadores;
    }

    public static function getConectados()
    {
        self::abrirConexion();
        $consulta = "SELECT * FROM jugador WHERE conectado = 1";
        if ($resultado = mysqli_query(self::$conexion, $consulta)) {
            $jugadores = [];
            while ($fila = mysqli_fetch_array($resultado)) {
                $p = new Persona($fila["email"], $fila["usuario"], $fila["pass"], $fila["foto"], $fila["activo"], $fila['victorias'], $fila['rol'], $fila['conectado']);
                $jugadores[$p->getEmail()] = $p;
            }
        }
        self::cerrarConexion();
        return $jugadores;
    }

    public static function addPartida($partida)
    {
        self::abrirConexion();
        $fallo = 'No hay fallo';
        $query = "INSERT INTO partida (id_partida, n_participantes, terminada, llaves, ganada) VALUES (null, ? , ?, ?, ?)";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "iiii", $partida->getN_participantes(), $partida->getTerminada(), $partida->getLlaves(), $partida->getGanada());
            mysqli_stmt_execute($stmt);
        } else {
            $fallo = "Error al insertar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function getUltimaPartida()
    {
        self::abrirConexion();
        $partida = null;
        $query = "SELECT * FROM partida WHERE id_partida = (SELECT MAX(id_partida) FROM partida)";
        if ($resultado = mysqli_query(self::$conexion, $query)) {
            while ($fila = mysqli_fetch_array($resultado)) {
                $partida = new Partida($fila["id_partida"], $fila["n_participantes"], $fila["terminada"], $fila["llaves"], $fila["ganada"]);
            }
        }
        self::cerrarConexion();
        return $partida;
    }

    public static function addParticipante($participante)
    {
        self::abrirConexion();
        $fallo = 'No hay fallo';
        $query = "INSERT INTO participantes (id_participante, email, id_partida, almirante) VALUES (null, ? , ?, ?)";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "sii", $participante->getEmail(), $participante->getId_partida(), $participante->getAlmirante());
            mysqli_stmt_execute($stmt);
        } else {
            $fallo = "Error al insertar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function getPartidas()
    {
        self::abrirConexion();
        $partida = null;
        $query = "SELECT * FROM partida";
        $partidas = [];
        if ($resultado = mysqli_query(self::$conexion, $query)) {
            while ($fila = mysqli_fetch_array($resultado)) {
                $partida = new Partida($fila["id_partida"], $fila["n_participantes"], $fila["terminada"], $fila["llaves"], $fila["ganada"]);
                $partidas[$partida->getId_partida()] = $partida;
            }
        }
        self::cerrarConexion();
        return $partidas;
    }

    public static function getParticipantes($id)
    {
        self::abrirConexion();
        $query = "SELECT * FROM participantes WHERE id_partida = ?";
        $stmt = mysqli_stmt_init(self::$conexion);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);
            $participantes = [];
            while ($fila = mysqli_fetch_array($resultado)) {
                $participante = new Participante($fila["id_participante"], $fila["email"], $fila["id_partida"], $fila["almirante"]);
                $participantes[$participante->getId_participante()] = $participante;
            }
        }
        self::cerrarConexion();
        return $participantes;
    }

    public static function unirme($participante)
    {
        self::abrirConexion();
        $numero = "SELECT * FROM partida WHERE id_partida = '" . $participante->getEmail() . "'";
        $numero = $numero + 1;
        $fallo = 'No hay fallo';
        $query = "UPDATE partida SET n_participantes = '$numero'";
        if (mysqli_query(self::$conexion, $query)) {
        } else {
            $fallo = "Error al modificar: " . mysqli_error(self::$conexion) . '<br/>';
        }
        self::cerrarConexion();
        return $fallo;
    }

    public static function getPartida($id)
    {
        self::abrirConexion();
        $partida = null;
        $query = "SELECT * FROM partida WHERE id_partida = ' $id '";
        if ($resultado = mysqli_query(self::$conexion, $query)) {
            while ($fila = mysqli_fetch_array($resultado)) {
                $partida = new Partida($fila["id_partida"], $fila["n_participantes"], $fila["terminada"], $fila["llaves"], $fila["ganada"]);
            }
        }
        self::cerrarConexion();
        return $partida;
    }
}