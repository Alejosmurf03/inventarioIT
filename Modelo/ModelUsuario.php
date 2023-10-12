<?php

//metodo para agregar un usuario en la BD
class ModelUsuario {
    private $miConexion;
    private $retorno;

	public function __construct(){
		$this->miConexion = Conexion::singleton();
		$this->retorno = new stdClass();
	}

	public function agregar(Usuario $unUsuario){
		try{
      	$this->miConexion->beginTransaction();
      	//agregar a la tabla usuario
      	$consulta="INSERT INTO usuario VALUES(null,?,?,?,?,?,?)";
            $resultado= $this->miConexion->prepare($consulta);
            $resultado->bindParam(1,$unUsuario->getHusuario());
            $resultado->bindParam(2,$unUsuario->getPassword());
            $resultado->bindParam(3,$unUsuario->getNombreCompleto());
            $resultado->bindParam(4,$unUsuario->getRol()->getID_rol());
            $resultado->bindParam(5,$unUsuario->getBase()->getID_base());
            $resultado->bindParam(6,$unUsuario->getEstado());
            $resultado->execute();
            $this->miConexion->commit();
            $this->retorno->estado=true;
            $this->retorno->mensaje="Usuario agregado correctamente";
		}catch(PDOException $ex){
			$this->miConexion->rollBack();
            $this->retorno->estado=FALSE;
            $this->retorno->mensaje="problemas al agregar ".$ex->getMessage();
            $this->retorno->datos=NULL;
            
		}
            return $this->retorno;
	}
        
        
        //metodo para listar las bases que estan registradas en BD
        public function listaBase(){
            try{
                  $consulta = "SELECT * FROM base";
                  $resultado = $this->miConexion->prepare($consulta);
               
                  $resultado->execute();
                  $result = $resultado->fetchAll();
            }catch(Exception $ex){
                  echo "!ERROR¡".$ex->getMessage(). "</br>";
            }
            return $result;

      }

      //metodo para listar los que estan registradas en BD
      public function listaRol(){
            try{
                  $consulta = "SELECT * FROM rol";
                  $resultado = $this->miConexion->prepare($consulta);

                  $resultado->execute();
                  $result = $resultado->fetchAll();
            }catch(Exception $ex){
                  echo "!ERROR¡".$ex->getMessage(). "</br>";
            }
            return $result;

        }
        
         //metodo para listar los usuarios diponibles
      public function listar($idUsuario){
            try{
                  $consulta="SELECT 
                                    usuario.ID_usuario AS idUsuario,
                                    usuario.ID_H AS Husuario,
                                    usuario.nombre_compl AS nombreUsuario,
                                    rol.nombre AS rolusuario,
                                    base.nombre AS baseUsuario,
                                    usuario.*,
                                    rol.*,
                                    base.*                  
                              FROM 
                                    usuario INNER JOIN 
                                    rol ON rol.ID_rol = usuario.ID_rol INNER JOIN
                                    base ON base.ID_base = usuario.ID_base
                              
                              WHERE usuario.Estado='Activo' and usuario.ID_usuario!= ?";     

                  $resultado = $this->miConexion->prepare($consulta); 
                  $resultado->bindParam(1, $idUsuario); 
                  $resultado->execute();
                  $this->retorno->estado=true;
                  $this->retorno->mensaje="Lista de Usuarios";
                  $this->retorno->datos=$resultado->fetchAll();
            } catch (PDOException $ex) {
                  $this->retorno->estado=false;
                  $this->retorno->mensaje="Problemas al listar ".$ex->getMessage();
                  $this->retorno->datos=null;
            }
             return $this->retorno;
      }



      //inactivar usuario
    public function InactivoUsuario($idUsuario){
            
      try{
          $consulta="update usuario set usuario.Estado = 'Inactivo' where usuario.ID_usuario= ?";
          $resultado = $this->miConexion->prepare($consulta);       
          //$resultado->bindParam(1, 8); 
          $resultado->bindParam(1, $idUsuario); 
          $resultado->execute();
          $this->retorno->estado=true;
          $this->retorno->mensaje="Actualizado";
      } catch (PDOException $ex) {
          $this->retorno->estado=false;
          $this->retorno->mensaje="Problemas al actualizar".$ex->getMessage();
          $this->retorno->datos=null;
      }
      return $this->retorno;
  }
  
  
  //actualizar un usuario
  public function actualizarUsuario($nombre,$idBase,$idRol, $idUsuario){
        try{
             $this->miConexion->beginTransaction();
             //actualizar a la tabla usuario
               $consulta="UPDATE `usuario` SET `nombre_compl` = ?, `ID_base` = ?, `ID_rol` = ? WHERE `usuario`.`ID_usuario` = ?";
            $resultado= $this->miConexion->prepare($consulta);
            $resultado->bindParam(1,$nombre);
            $resultado->bindParam(2,$idBase);
            $resultado->bindParam(3,$idRol);
            $resultado->bindParam(4,$idUsuario);
            $resultado->execute();
            $this->miConexion->commit();
            $this->retorno->estado=true;
            $this->retorno->mensaje="usuario actualizado correctamente";

        }catch(PDOException $ex){
            $this->miConexion->rollBack();
            $this->retorno->estado=FALSE;
            $this->retorno->mensaje="problemas al actualizar ".$ex->getMessage();
            $this->retorno->datos=NULL;
        }
        return $this->retorno;
    }

    //obtener los datos de un usuario
    public function obtenerUsuario($idUsuario){
      try{
             $consulta="SELECT usuario.ID_usuario AS idUsuario, 
                  usuario.nombre_compl AS nombreUsuario,
                  rol.ID_rol AS idRol,
                  rol.nombre AS rolusuario, 
                  base.nombre AS baseUsuario,base.ID_base as idBase, usuario.*, rol.*, base.* FROM usuario 
                  INNER JOIN rol ON rol.ID_rol = usuario.ID_rol 
                  INNER JOIN base ON base.ID_base = usuario.ID_base 
                  WHERE usuario.ID_usuario = ?";
          $resultado= $this->miConexion->prepare($consulta);
          $resultado->bindParam(1,$idUsuario);
          $resultado->execute();
          $this->retorno->estado=true;
          $this->retorno->mensaje="datos usuario";
          $this->retorno->datos=$resultado->fetchAll();
      }catch(PDOException $ex){
          $this->retorno->estado=FALSE;
          $this->retorno->mensaje="problemas ".$ex->getMessage();
          $this->retorno->datos=NULL;
      }
      return $this->retorno;
  }
  
  //metodo para obtener la clave que el usuario tiene registrada en el sistema para actualizarla
  public function obtenerClave($hUsuario,$clave){
      try{
             $consulta="select * from usuario where usuario.ID_H= ? and usuario.pass =?";
          $resultado= $this->miConexion->prepare($consulta);
          $resultado->bindParam(1,$hUsuario);
          $resultado->bindParam(2,$clave);
          $resultado->execute();
          $this->retorno->estado=true;
          $this->retorno->mensaje="clave";
          $this->retorno->datos=$resultado->fetchAll();
      }catch(PDOException $ex){
          $this->retorno->estado=FALSE;
          $this->retorno->mensaje="problemas ".$ex->getMessage();
          $this->retorno->datos=NULL;
      }
      return $this->retorno;
  }
  
  
    
      public function actualizarClave($clave,$hUsuario){
            
        try{
            $consulta="update usuario set usuario.pass = ? where usuario.ID_H= ?";
            $resultado = $this->miConexion->prepare($consulta);       
            //$resultado->bindParam(1, 8); 
            $resultado->bindParam(1, $clave); 
            $resultado->bindParam(2, $hUsuario); 
            $resultado->execute();
            $this->retorno->estado=true;
            $this->retorno->mensaje="Actualizado";
        } catch (PDOException $ex) {
            $this->retorno->estado=false;
            $this->retorno->mensaje="Problemas al actualizar".$ex->getMessage();
            $this->retorno->datos=null;
        }
        return $this->retorno;
    }
  
    
    //metodo para valida que el usuario no repita
    public function validarUsuario($hUsuario){
      try{
             $consulta="select * from usuario where usuario.ID_H= ?";
          $resultado= $this->miConexion->prepare($consulta);
          $resultado->bindParam(1,$hUsuario);
          $resultado->execute();
          $this->retorno->estado=true;
          $this->retorno->mensaje="clave";
          $this->retorno->datos=$resultado->fetchAll();
      }catch(PDOException $ex){
          $this->retorno->estado=FALSE;
          $this->retorno->mensaje="problemas ".$ex->getMessage();
          $this->retorno->datos=NULL;
      }
      return $this->retorno;
  }
  
  
  

      
      
 
      
}
