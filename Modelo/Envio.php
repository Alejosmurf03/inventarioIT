<?php

class Envio {
    private $idEnvio;
    private $numeroGuia;
    private $base;
    private $observacion;
    private $usuario;
    private $hUsuarioEnvia;
    
    
    public function __construct($numeroGuia=null,Base $base=null,$observacion=null, $usuario=null,$hUsuarioEnvia=null ){
		$this->numeroGuia = $numeroGuia;
                $this->base = $base;
                $this->observacion = $observacion;         
                $this->usuario = $usuario;
                $this->hUsuarioEnvia = $hUsuarioEnvia;
	}
        
    //id envio
    public function setIdEnvio($idEnvio){
		$this->idEnvio=$idEnvio;
	}
        
    public function getIdEnvio(){
		return $this->idEnvio;
	}
        
    //numero de guia envio
    public function setNumeroGuia($numeroGuia){
		$this->numeroGuia=$numeroGuia;
	}
        
    public function getNumeroGuia(){
		return $this->numeroGuia;
	}
          
     //destino del(os) materiales
    public function setBase($base){
		$this->base=$base;
	}
        
    public function getBase(){
		return $this->base;
	}
        
     //observacion que se le hace a lo se envia
    public function setObservacion($observacion){
		$this->observacion=$observacion;
	}
        
    public function getObservacion(){
		return $this->observacion;
	}
        
     
     //objeto del usuario quien envia
    public function setUsuario($usuario){
		$this->usuario=$usuario;
	}
        
    public function getUsuario(){
		return $this->usuario;
	}
    
        //quien se le realiza el envio
    public function setHUsuarioEnvia($hUsuarioEnvia){
		$this->hUsuarioEnvia=$hUsuarioEnvia;
	}
        
    public function getHUsuarioEnvia(){
		return $this->hUsuarioEnvia;
	}
    
    
}
