<?php
class Persona {
    private $email;
    private $usuario;
    private $pass;
    private $foto;
    private $activo;

    public function __construct($email, $usuario, $pass, $foto)
    {
        $this->email = $email;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->foto = $foto;
        $this->activo = 1;
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

    function setActivo($activo): void {
        $this->activo = $activo;
    }

    function getActivo() {
        return $this->activo;
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
        $cad .= '<td><input placeholder="*****" type="password" name="pass" value=""></td>';
        $cad .= '<td><input type="text" name="foto" value="' . $this->foto . '"></td>';
        $cad .= '<td><input type="text" name="activo" value="' . $this->activo . '"></td>';
        return $cad;
    }
}