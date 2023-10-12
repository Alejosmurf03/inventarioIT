<?php


class Usuario {
    private $idUsuario;
    private $hUsuario;
    private $password;
    private $nombreCompleto;
    private $unRol;
    private $unabase;
    private $estado;
    
    //constructor principal 
    public function __construct($hUsuario=null, $password=null, $nombreCompleto=null, Rol $unRol=null,Base $unabase=null, $estado=null ){
		$this->hUsuario = $hUsuario;
		$this->password = $password;
                $this->nombreCompleto = $nombreCompleto;
                $this->unRol = $unRol;
                $this->unabase = $unabase;
                $this->estado = $estado;
	}
      
    //id usuario
    public function setIdUsuario($idUsuario){
		$this->idUsuario=$idUsuario;
	}
        
    public function getIdUsuario(){
		return $this->idUsuario;
	}
    
    //H del usuario
     public function setHUsuario($hUsuario){
		$this->hUsuario=$hUsuario;
	}
    public function getHUsuario(){
		return $this->hUsuario;
	} 
       
    //Contraseña del usuario
    public function setPassword($password){
		$this->password=$password;
	}
    public function getPassword(){
		return $this->password;
	}
        
    //Nombre del Usuario
    public function setNombreCompleto($nombreCompleto){
		$this->nombreCompleto=$nombreCompleto;
	}
    public function getNombreCompleto(){
		return $this->nombreCompleto;
	}
     
    //Rol Usuario
    public function setRol($unRol){
		$this->unRol=$unRol;
	}
    public function getRol(){
		return $this->unRol;
	}
    
    //Base
    public function setBase($unabase){
		$this->unabase=$unabase;
	}
    public function getBase(){
		return $this->unabase;
  }
  
  //Estado
  public function setEstado($estado){
		$this->estado=$estado;
	}
    public function getEstado(){
		return $this->estado;
	}
}

