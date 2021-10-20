<?php
class Persona {
    private $email;
    private $usuario;
    private $pass;
    private $foto;

    public function __construct($email, $usuario, $pass, $foto)
    {
        $this->email = $email;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->foto = $foto;
    }
    
    function getUsuario() {
        return $this->usuario;
    }

    function getEmail() {
        return $this->email;
    }

    function getPass() {
        return $this->pass;
    }

    function getFoto() {
        return $this->foto;
    }

    function setUsuario($nombre): void {
        $this->nombre = $nombre;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setFoto($foto): void {
        $this->foto = $foto;
    }
    
    public function __toString()
    {
        $cad = '<td><input type="email" name="nombre" value="' . $this->email . '"></td>';
        $cad = '<td><input type="text" name="nombre" value="' . $this->usuario . '"></td>';
        $cad = '<td><input type="text" name="nombre" value="' . $this->nivel . '"></td>';
        $cad = '<td><input type="number" name="nombre" value="' . $this->llaves . '"></td>';
        return $cad;
    }
}