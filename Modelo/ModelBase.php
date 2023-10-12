<?php

//metodo para agregar un material en la BD
class ModelBase {
    private $miConexion;
    private $retorno;

	public function __construct(){
		$this->miConexion = Conexion::singleton();
		$this->retorno = new stdClass();
	}
 
    public function agregar(Base $unaBase){
		try{
      	$this->miConexion->beginTransaction();
      	//agregar a la tabla material
      	$consulta="INSERT base VALUES(null,?)";
            $resultado= $this->miConexion->prepare($consulta);
            $resultado->bindParam(1,$unaBase->getNombre());
            $resultado->execute();
            $this->miConexion->commit();
            $this->retorno->estado=true;
            $this->retorno->mensaje="Base agregada correctamente";
        }catch(PDOException $ex){
            $this->miConexion->rollBack();
            $this->retorno->estado=FALSE;
            $this->retorno->mensaje="problemas al agregar ".$ex->getMessage();
            $this->retorno->datos=NULL;
            
		}
            return $this->retorno;
	}
    
      
}
