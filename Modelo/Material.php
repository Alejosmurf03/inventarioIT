<?php

class Material {

    private $idMaterial;
    private $cod_barras;
    private $idUsuario;
    private $serial;
    private $unaBase;
    private $idTipo;
    private $caracte;
    private $costoGrfs;
    private $estado;

    public function __construct($cod_barras = null, $idUsuario = null, $serial = null, Base $unaBase = null, $idTipo = null, $costoGrfs = null, $caracte = null,$estado = null) {
        $this->cod_barras = $cod_barras;
        $this->idUsuario = $idUsuario;
        $this->serial = $serial;
        $this->unaBase = $unaBase;
        $this->idTipo = $idTipo;
        $this->costoGrfs = $costoGrfs;
        $this->estado = $estado;
        $this->caracte = $caracte;
    }

    //id del material
    public function setIdMaterial($idMaterial) {
        $this->idMaterial = $idMaterial;
    }

    public function getIdMaterial() {
        return $this->idMaterial;
    }

    //codigo de barras del material
    public function setCod_barras($cod_barras) {
        $this->cod_barras = $cod_barras;
    }

    public function getCod_barras() {
        return $this->cod_barras;
    }

    //objeto de usuario
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    //serial del equipo 
    public function setSerial($serial) {
        $this->serial = $serial;
    }

    public function getSerial() {
        return $this->serial;
    }

    //objeto de base
    public function setBase($unaBase) {
        $this->unaBase = $unaBase;
    }

    public function getBase() {
        return $this->unaBase;
    }

    //objeto de tipo material
    public function setIdTipo($idTipo) {
        $this->idTipo = $idTipo;
    }

    public function getIdTipo() {
        return $this->idTipo;
    }

    //costo del grfs
    public function setCostoGrfs($costoGrfs) {
        $this->costoGrfs = $costoGrfs;
    }

    public function getCostoGrfs() {
        return $this->costoGrfs;
    }

    //estado en el que esta el material, enviado, etc.
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getEstado() {
        return $this->estado;
    }

    //caracteristicas del equipo
    public function setcaracte($caracte) {
        $this->caracte = $caracte;
    }

    public function getcaracte() {
        return $this->caracte;
    }

}
