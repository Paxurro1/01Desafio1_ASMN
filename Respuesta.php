<?php
require_once 'Conexion.php';
require_once 'Pregunta.php';
class Respuesta {
    private $id_opcion;
    private $id_pregunta;
    private $respuesta;

    public function __construct($id_opcion, $id_pregunta, $respuesta)
    {
        $this->id_opcion = $id_opcion;
        $this->id_pregunta = $id_pregunta;
        $this->respuesta = $respuesta;
    }
    
    function getId_opcion() {
        return $this->id_opcion;
    }

    function getId_pregunta() {
        return $this->id_pregunta;
    }

    function getRespuesta() {
        return $this->respuesta;
    }
    
    public function __toString()
    {
        $cad = '<div class="row">';
        $cad .= '<label class="s-col-2 m-col-2 l-col-2" for="pregunta">ID</label>';
        $cad .= '<label class="s-col-8 m-col-8 l-col-8" for="activo">Respuesta</label>';
        $cad .= '</div>';
        $cad .= '<div class="row">';
        $cad .= '<input class="s-col-2 m-col-2 l-col-2" required type="text" name="id_opcion" value="' . $this->id_opcion . '">';
        $cad .= '<input class="s-col-8 m-col-8 l-col-8" required type="text" name="respuesta" value="' . $this->respuesta . '">';
        $cad .= '</div>';
        return $cad;
    }

    public function __toString2($radio, $opcion, $opcion2)
    {
        $pregunta = Conexion::getPreguntaId($this->id_pregunta);
        $cad = '<div class="row">';
        $cad .= '<label class="s-col-2 m-col-2 l-col-2" for="pregunta">ID</label>';
        $cad .= '<label class="s-col-8 m-col-8 l-col-8" for="activo">Respuesta</label>';
        $cad .= '</div>';
        $cad .= '<div class="row">';
        //Este es el id de la pocion
        $cad .= '<input class="s-col-2 m-col-2 l-col-2" required type="text" name="' . $opcion . '" value="' . $this->id_opcion . '">';
        //Esta es la opción/respuesta
        $cad .= '<input class="s-col-8 m-col-8 l-col-8" required type="text" name="' . $opcion2 . '" value="' . $this->respuesta . '">';
        $valor = $this->respuesta == $pregunta->getRespuesta() ? ' checked ' : ' ';
        $cad .= '<input type="radio" name="verdadera" id="" value="' . $radio . '" '. $valor .' class="s-col-1 m-col-1 l-col-1">';
        $cad .= '</div>';
        return $cad;
    }
}