<?php
class Partida {
    private $id_partida;
    private $n_participantes;
    private $terminada;
    private $llaves;
    private $ganada;

    public function __construct($id_partida, $n_participantes, $terminada, $llaves, $ganada)
    {
        $this->id_partida = $id_partida;
        $this->n_participantes = $n_participantes;
        $this->terminada = $terminada;
        $this->llaves = $llaves;
        $this->ganada = $ganada;
    }
    

    
    function getId_partida() {
        return $this->id_partida;
    }

    function getN_participantes() {
        return $this->n_participantes;
    }

    function getTerminada() {
        return $this->terminada;
    }

    function getLlaves() {
        return $this->llaves;
    }

    function getGanada() {
        return $this->ganada;
    }

    public function __toString()
    {
        $cad = '<div class="row">';
        $cad .= '<label class="s-col-8 m-col-8 l-col-8" for="id_partida">ID de la partida</label>';
        $cad .= '<input class="s-col-4 m-col-4 l-col-4" type="text" name="id_partida" id=""  value="' . $this->id_partida . '" readonly>';
        $cad .= '</div>';
        $cad .= '<div class="row">';
        $cad .= '<label class="s-col-8 m-col-8 l-col-8" for="participantes">Participantes</label>';
        $cad .= '<input class="s-col-4 m-col-4 l-col-4" type="text" name="participantes" id=""  value="' . $this->n_participantes . '" readonly>';
        $cad .= '</div>';
        return $cad;
    }
}