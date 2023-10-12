<?php
require_once 'Usuario.php';

class EntregaMaterial {
    private $idEntregaMaterial;
    private $grfs;
    private $fecha;
    private $unUsuario;
    private $observacion;
    private $hUsuarioEntrega;
    
    public function __construct($grfs=null, $fecha=null,Usuario $unUsuario=null, $observacion=null,$hUsuarioEntrega=null ){
		$this->grfs = $grfs;
		$this->fecha = $fecha;
                $this->unUsuario = $unUsuario;
                $this->observacion = $observacion;
                $this->hUsuarioEntrega = $hUsuarioEntrega;
                
	}
        
    //id envio
    public function setIdEntregaMaterial($idEntregaMaterial){
		$this->idEntregaMaterial=$idEntregaMaterial;
	}
        
    public function getIdEntregaMaterial(){
		return $this->idEntregaMaterial;
	}
        
    //rq de grfs
    public function setGrfs($grfs){
		$this->grfs=$grfs;
	}
        
    public function getGrfs(){
		return $this->grfs;
	}
        
    //fecha en el que se entrega el(los) material(es)
    public function setFecha($fecha){
		$this->fecha=$fecha;
	}
        
    public function getFecha(){
		return $this->fecha;
	}
        
    //usuario quien entrega el(los) material(es)
    public function setUnUsuario($unUsuario){
		$this->unUsuario=$unUsuario;
	}
        
    public function getUnUsuario(){
		return $this->unUsuario;
	}
        
    //observacion de entrega
    public function setObservacion($observacion){
		$this->observacion=$observacion;
	}
        
    public function getObservacion(){
		return $this->observacion;
	}
        
        //observacion de entrega
    public function setHUsuarioEntrega($hUsuarioEntrega){
		$this->hUsuarioEntrega=$hUsuarioEntrega;
	}
        
    public function getHUsuarioEntrega(){
		return $this->hUsuarioEntrega;
	}
}
