<?php

class TipoMaterial {
     private $idTipoMaterial;
    private $tipo;
    
    public function __construct($tipo=null){
		$this->tipo = $tipo;
    }
    
    //id tipo dle material
    public function setIdTipoMaterial($idTipoMaterial){
		$this->idTipoMaterial=$idTipoMaterial;
	}
        
    public function getIdTipoMaterial(){
		return $this->idTipoMaterial;
	}
        
    //tipo de material
    public function setTipo($tipo){
		$this->tipo=$tipo;
	}
        
    public function getTipo(){
		return $this->tipo;
	}
}
