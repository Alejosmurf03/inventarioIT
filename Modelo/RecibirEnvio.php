<?php
require_once ('Usuario');
require_once ('Material');
require_once ('Envio');

class RecibirEnvio {
    private $idRecibirEnvio;
    private $unEnvio;
    private $unMaterial;
    private $unUsuario;
    private $fechaRecibe;
    
    public function __construct(Envio $unEnvio=null,Material $unMaterial=null,Usuario $unUsuario=null,$fechaRecibe=null){
		$this->unEnvio = $unEnvio;
                $this->unMaterial = $unMaterial;
                $this->unUsuario = $unUsuario;
                $this->fechaRecibe = $fechaRecibe;
    }
    
    //id recibir envio
    public function setIdRecibirEnvio($idRecibirEnvio){
		$this->idRecibirEnvio=$idRecibirEnvio;
	}
        
    public function getIdRecibirEnvio(){
		return $this->idRecibirEnvio;
	}
        
     //un envio
    public function setUnEnvio($unEnvio){
		$this->unEnvio=$unEnvio;
	}
        
    public function getUnEnvio(){
		return $this->unEnvio;
	}
    //un material
    public function setUnMaterial($unMaterial){
		$this->unMaterial=$unMaterial;
	}
        
    public function getUnMaterial(){
		return $this->unMaterial;
	}
        
      
        //objeto de usuario
    public function setUnUsuario($unUsuario){
		$this->unUsuario=$unUsuario;
	}
        
    public function getUnUsuario(){
		return $this->unUsuario;
	}
        
     //fecha en que recibe el envio
    public function setFechaRecibe($fechaRecibe){
		$this->fechaRecibe=$fechaRecibe;
	}
        
    public function getFechaRecibe(){
		return $this->fechaRecibe;
	}
        
   
}
