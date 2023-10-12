<?php

class Disposal {
    private $idDisposal;
    private $idMaterial;
    private $observacion;
    
     public function __construct(Material $idMaterial=null,$observacion=null){
		$this->idMaterial = $idMaterial;
		$this->observacion = $observacion;
                
	}
  
        //id del material
    public function setIdDisposal($idDisposal){
		$this->idDisposal=$idDisposal;
	}
        
    public function getIdDisposal(){
		return $this->idDisposal;
	}
        
        //codigo de barras del material
    public function setMaterial($idMaterial){
		$this->idMaterial=$idMaterial;
	}
        
    public function getMaterial(){
		return $this->idMaterial;
	}
        
        //objeto de usuario
    public function setObservacion($observacion){
		$this->observacion=$observacion;
	}
        
    public function getObservacion(){
		return $this->observacion;
	}
              
        
    
}
