<?php
class Participante {
    private $id_participante;
    private $email;
    private $id_partida;
    private $almirante;

    public function __construct($id_participante, $email, $id_partida, $almirante)
    {
        $this->id_participante = $id_participante;
        $this->email = $email;
        $this->id_partida = $id_partida;
        $this->almirante = $almirante;
    }
    
    function getId_participante() {
        return $this->id_participante;
    }

    function getEmail() {
        return $this->email;
    }
    
    function getId_partida() {
        return $this->id_partida;
    }

    function getAlmirante() {
        return $this->almirante;
    }
    
}