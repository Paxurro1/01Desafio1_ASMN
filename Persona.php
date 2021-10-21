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

    function setUsuario($usuario): void {
        $this->usuario = $usuario;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setFoto($foto): void {
        $this->foto = $foto;
    }
    
    public function __toString()
    {
        $cad = '<td><input required minlength="5" type="email" name="email" value="' . $this->email . '"></td>';
        $cad .= '<td><input required minlength="3" type="text" name="usuario" value="' . $this->usuario . '"></td>';
        $cad .= '<td><input required minlength="5" type="password" name="pass" value="' . $this->pass . '"></td>';
        $cad .= '<td><input minlength="5" type="text" name="foto" value="' . $this->foto . '"></td>';
        return $cad;
    }
}