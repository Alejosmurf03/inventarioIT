<?php

class Mantenimiento {

    private $idMantenimiento;
    private $numero_ticket;
    private $observacion_fallo;
    private $observacion_entrega;
    private $idUsuario;

    public function __construct($numero_ticket = null, $observacion_fallo = null, $observacion_entrega = null, $idUsuario = null) {

        $this->numero_ticket = $numero_ticket;
        $this->observacion_fallo = $observacion_fallo;
        $this->observacion_entrega = $observacion_entrega;
        $this->idUsuario = $idUsuario;
    }

    //id de mantenimiento
    public function setidMantenimiento($idMantenimiento) {
        $this->idMantenimiento = $idMantenimiento;
    }

    public function getidMantenimiento() {
        return $this->idMantenimiento;
    }

    //numero de ticket
    public function setnumero_ticket($numero_ticket) {
        $this->numero_ticket = $numero_ticket;
    }

    public function getnumero_ticket() {
        return $this->numero_ticket;
    }

    //observaciones de fallo
    public function setobservacion_fallo($observacion_fallo) {
        $this->observacion_fallo = $observacion_fallo;
    }

    public function getobservacion_fallo() {
        return $this->observacion_fallo;
    }

    //observaciones de entrega 
    public function setobservacion_entrega($observacion_entrega) {
        $this->observacion_entrega = $observacion_entrega;
    }

    public function getobservacion_entrega() {
        return $this->observacion_entrega;
    }

    //id usuario
    public function setidUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getidUsuario() {
        return $this->idUsuario;
    }
    
   
}
