<?php


class Base {
    private $ID_base;
    private $nombre;
    
    public function __construct($nombre=null){
		$this->nombre = $nombre;
    }
    
    //id base
    public function setID_base($ID_base){
		$this->ID_base=$ID_base;
	}
        
    public function getID_base(){
		return $this->ID_base;
	}
        
    //nombre base
    public function setNombrebase($nombre){
		$this->nombre=$nombre;
	}
        
    public function getNombre(){
		return $this->nombre;
	}
}
