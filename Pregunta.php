<?php
class Pregunta {
    private $id_pregunta;
    private $pregunta;
    private $respuesta;

    public function __construct($id_pregunta, $pregunta, $respuesta)
    {
        $this->id_pregunta = $id_pregunta;
        $this->pregunta = $pregunta;
        $this->respuesta = $respuesta;
    }
    
    function getId_pregunta() {
        return $this->id_pregunta;
    }

    function getPregunta() {
        return $this->pregunta;
    }

    function getRespuesta() {
        return $this->respuesta;
    }
    
    public function __toString()
    {
        $cad = '<div class="row">';
        $cad .= '<label class="s-col-5 m-col-5 l-col-5" for="id_pregunta">ID de la pregunta</label>';
        $cad .= '<input class="s-col-2 m-col-2 l-col-2" type="text" name="id_pregunta" id=""  value="' . $this->id_pregunta . '" readonly>';
        $cad .= '</div>';
        $cad .= '<div class="row">';
        $cad .= '<label class="s-col-4 m-col-4 l-col-4" for="pregunta">Pregunta</label>';
        $cad .= '<textarea class="s-col-12 m-col-12 l-col-12" name="pregunta" cols="30" rows="10" required minlength="2" maxlength="200">' . $this->pregunta . '</textarea>';
        $cad .= '</div>';
        return $cad;
    }
}