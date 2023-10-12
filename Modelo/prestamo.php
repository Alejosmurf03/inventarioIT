<?php

class prestamo {

    private $idPrestamo;
    private $hUsuarioPresta;
    private $fechaEntrega;
    private $descripcion;
    private $idUsuario;

    public function __construct($hUsuarioPresta = null, $fechaEntrega = null, $descripcion = null,$idUsuario = null) {
        $this->hUsuarioPresta = $hUsuarioPresta;
        $this->fechaEntrega = $fechaEntrega;
        $this->descripcion = $descripcion;
        $this->idUsuario = $idUsuario;
    }

    //id prestamo
    public function setIdPrestamo($idPrestamo) {
        $this->idPrestamo = $idPrestamo;
    }

    public function getIdPrestamo() {
        return $this->idPrestamo;
    }

    //h del usuario a quien le va a prestar
    public function setHUsuarioPresta($hUsuarioPresta) {
        $this->hUsuarioPresta = $hUsuarioPresta;
    }

    public function getHUsuarioPresta() {
        return $this->hUsuarioPresta;
    }

    //fecha del prestamo
    public function setFechaPrestamo($fechaPrestamo) {
        $this->fechaPrestamo = $fechaPrestamo;
    }

    public function getFechaPrestamo() {
        return $this->fechaPrestamo;
    }

    //fecha entrega
    public function setFechaEntrega($fechaEntrega) {
        $this->fechaEntrega = $fechaEntrega;
    }

    public function getFechaEntrega() {
        return $this->fechaEntrega;
    }

    //descripcion
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    //unUsuario
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

}
