<?php
class Persona {
    private $email;
    private $usuario;
    private $pass;
    private $foto;
    private $activo;
    private $victorias;
    private $rol;
    private $conectado;

    public function __construct($email, $usuario, $pass, $foto, $activo, $victorias, $rol, $conectado)
    {
        $this->email = $email;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->foto = $foto;
        $this->activo = $activo;
        $this->victorias = $victorias;
        $this->rol = $rol;
        $this->conectado = $conectado;
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

    function getRol() {
        return $this->rol;
    }

    function setConectado($conectado): void {
        $this->conectado = $conectado;
    }

    function getConectado() {
        return $this->conectado;
    }

    function setRol($rol): void {
        $this->rol = $rol;
    }

    function getVictorias() {
        return $this->victorias;
    }

    function setVictorias($victorias): void {
        $this->victorias = $victorias;
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
        $cad = '<div class="row">';
        $cad .= '<label class="s-col-4 m-col-4 l-col-4">Email</label>';
        $cad .= '<input class="s-col-8 m-col-8 l-col-8" type="email" name="email" value="' . $this->email . '" readonly>';
        $cad .= '</div>';
        $cad .= '<div class="row">';
        $cad .= '<label class="s-col-4 m-col-4 l-col-4">Usuario</label>';
        $cad .= '<input class="s-col-8 m-col-8 l-col-8" required minlength="3" type="text" id="usuario" name="usuario" value="' . $this->usuario . '">';
        $cad .= '</div>';
        $cad .= '<div class="row">';
        $cad .= '<label class="s-col-4 m-col-4 l-col-4">Activo</label>';
        $cad .= '<input class="s-col-8 m-col-8 l-col-8" required type="text" name="activo" id="activo" value="' . $this->activo . '">';
        $cad .= '</div>';
        $cad .= '<div class="row">';
        $cad .= '<label class="s-col-4 m-col-4 l-col-4">Rol</label>';
        $cad .= '<input class="s-col-8 m-col-8 l-col-8" required type="text" name="rol" id="rol" value="' . $this->rol . '">';
        $cad .= '</div>';
        return $cad;
    }
}