<?php

//metodo para agregar un material en la BD
class ModelTipoMaterial {
    private $miConexion;
    private $retorno;

	public function __construct(){
		$this->miConexion = Conexion::singleton();
		$this->retorno = new stdClass();
	}
 
    public function agregar(TipoMaterial $unTipoMaterial){
		try{
      	$this->miConexion->beginTransaction();
      	//agregar a la tabla material
      	$consulta="INSERT INTO tipo_material VALUES(null,?)";
            $resultado= $this->miConexion->prepare($consulta);
            $resultado->bindParam(1,$unTipoMaterial->getTipo());
            $resultado->execute();
            $this->miConexion->commit();
            $this->retorno->estado=true;
            $this->retorno->mensaje="Tipo agregado correctamente";
        }catch(PDOException $ex){
            $this->miConexion->rollBack();
            $this->retorno->estado=FALSE;
            $this->retorno->mensaje="problemas al agregar ".$ex->getMessage();
            $this->retorno->datos=NULL;
            
		}
            return $this->retorno;
	}
    //metodo para listar los tipo materiales que estan registradas en BD
    public function listaTipoMaterial($tipoMaterial){
        try{
            $tipo = $tipoMaterial->getTipo();
            $consulta = "SELECT * FROM tipo_material WHERE nombre like '%$tipo%'";
            $resultado = $this->miConexion->prepare($consulta);
      
            $resultado->execute();
            $result = $resultado->fetchAll();
        }catch(Exception $ex){
              echo "!ERROR¡".$ex->getMessage(). "</br>";
        }
        return $result;
  }
      
}
