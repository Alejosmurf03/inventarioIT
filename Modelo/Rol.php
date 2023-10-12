<?php


class Rol {
    private $ID_rol;
    private $nombre;
    
    //constructor principal 
    public function __construct($nombre=null ){
		$this->nombre = $nombre;
		
	}
      
    //id rol
    public function setID_rol($ID_rol){
		$this->ID_rol=$ID_rol;
	}
        
    public function getID_rol(){
		return $this->ID_rol;
	}
    
    //nombre rol
     public function setNombre($nombre){
		$this->nombre=$nombre;
	}
    public function getNombre(){
		return $this->nombre;
	} 
     
}

