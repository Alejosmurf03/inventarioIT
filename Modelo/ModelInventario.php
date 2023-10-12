<?php

//metodo para agregar un material en la BD
class ModelInventario {
    private $miConexion;
    private $retorno;

	public function __construct(){
		$this->miConexion = Conexion::singleton();
		$this->retorno = new stdClass();
	}

     //metodo para listar los materiales activos
      public function listarActivos($base){
            try{
                  $consulta="SELECT material.cod_barras AS codigoBarras, "
                          . "material.serial_equipo AS serial, "
                          . "material.fecha_ingreso AS fecha, tipo_material.nombre AS nombreTipo, "
                          . "material.*, tipo_material.*, base.* FROM material INNER JOIN tipo_material "
                          . "ON tipo_material.ID_tipo_material = material.ID_tipo INNER JOIN base "
                          . "ON base.ID_base = material.ID_base WHERE material.estado='Activo' "
                          . "and base.nombre = ?";     

                  $resultado = $this->miConexion->prepare($consulta); 
                  $resultado->bindParam(1,$base);
                  $resultado->execute();
                  $this->retorno->estado=true;
                  $this->retorno->mensaje="Lista";
                  $this->retorno->datos=$resultado->fetchAll();
            } catch (PDOException $ex) {
                  $this->retorno->estado=false;
                  $this->retorno->mensaje="Problemas al listar ".$ex->getMessage();
                  $this->retorno->datos=null;
            }
             return $this->retorno;
      }  
      
      
      //metodo para listar los materiales disposal de la base
      public function listarDisposal($base){
            try{
                  $consulta="SELECT material.cod_barras AS codigoBarras,"
                          . " material.serial_equipo AS serial,"
                          . " disposal.fecha AS fechaDisposal,"
                          . " tipo_material.nombre AS nombreTipo,"
                          . "disposal.observacion As observacion, material.*, "
                          . "tipo_material.*, base.*, disposal.* FROM material "
                          . "INNER JOIN tipo_material ON "
                          . "tipo_material.ID_tipo_material = material.ID_tipo "
                          . "INNER JOIN base ON base.ID_base = material.ID_base "
                          . "inner join disposal on disposal.id_Material = material.ID_material "
                          . "WHERE material.estado='Inactivo' and base.nombre = ?";     

                  $resultado = $this->miConexion->prepare($consulta); 
                  $resultado->bindParam(1,$base);
                  $resultado->execute();
                  $this->retorno->estado=true;
                  $this->retorno->mensaje="Lista";
                  $this->retorno->datos=$resultado->fetchAll();
            } catch (PDOException $ex) {
                  $this->retorno->estado=false;
                  $this->retorno->mensaje="Problemas al listar ".$ex->getMessage();
                  $this->retorno->datos=null;
            }
             return $this->retorno;
      }
      
       //metodo para listar los materiales prestados de la base
      public function listarPrestados($base){
            try{
                  $consulta="SELECT material.cod_barras AS codigoBarras, "
                          . "material.serial_equipo AS serial, "
                          . "prestamo.fecha_prestamo AS fechaPrestamo,"
                          . "prestamo.fecha_entrega as fechaEntrega, "
                          . "tipo_material.nombre AS nombreTipo,"
                          . "prestamo.H_usuarioPresta As hPresta,"
                          . "prestamo.descripcionPrestamo As observacionPres, "
                          . "prestamo.descripcionEntrega as observacionEntre, material.*,"
                          . " tipo_material.*, base.*, prestamo.*,prestamo_has_material.* "
                          . "FROM material INNER JOIN tipo_material "
                          . "ON tipo_material.ID_tipo_material = material.ID_tipo "
                          . "INNER JOIN base ON base.ID_base = material.ID_base "
                          . "inner join prestamo_has_material "
                          . "on prestamo_has_material.ID_material = material.ID_material "
                          . "inner JOIN prestamo on prestamo.ID_prestamo=prestamo_has_material.ID_prestamo "
                          . "WHERE (material.estado='Prestado' or material.estado='Recibido') and base.nombre = ?";     

                  $resultado = $this->miConexion->prepare($consulta); 
                  $resultado->bindParam(1,$base);
                  $resultado->execute();
                  $this->retorno->estado=true;
                  $this->retorno->mensaje="Lista";
                  $this->retorno->datos=$resultado->fetchAll();
            } catch (PDOException $ex) {
                  $this->retorno->estado=false;
                  $this->retorno->mensaje="Problemas al listar ".$ex->getMessage();
                  $this->retorno->datos=null;
            }
             return $this->retorno;
      }
      
      //metodo para listar los materiales prestados de la base
      public function listarEnviados($idbase){
            try{
                  $consulta="select material.cod_barras as codigo, "
                          . "material.serial_equipo as serial, "
                          . "material.caracteristicas as caracteristica, "
                          . "tipo_material.nombre as tipoMaterial, "
                          . "envio.Numero_guia as numeroGuia, "
                          . "envio_detalle.grfs as grfs, "
                          . "envio.fecha_envio as fechaEnvio, "
                          . "recibir_envio.fecha_recibe as fechaRecibido,"
                          . " material.estado as estadoMaterial, "
                          . "base.nombre as baseEnvia, "
                          . "envio.observa_envio as observacionEnvio, material.*, "
                          . "tipo_material.*, envio.*, envio_detalle.*, "
                          . "base.*,usuario.*, recibir_envio.* from material "
                          . "inner join tipo_material on tipo_material.ID_tipo_material = material.ID_tipo "
                          . "inner join envio_detalle on envio_detalle.ID_material = material.ID_material "
                          . "inner join envio on envio.ID_envio = envio_detalle.ID_envio "
                          . "inner join base on base.ID_base=envio.ID_base_destino "
                          . "inner join recibir_envio on recibir_envio.ID_envio = envio.ID_envio "
                          . "INNER join usuario on usuario.ID_usuario = envio.ID_usuario "
                          . "where (material.estado = 'Enviado' or material.estado = 'Recibido' "
                          . "or material.estado = 'Asignado') and usuario.ID_base = ?";     

                  $resultado = $this->miConexion->prepare($consulta); 
                  $resultado->bindParam(1,$idbase);
                  $resultado->execute();
                  $this->retorno->estado=true;
                  $this->retorno->mensaje="Lista";
                  $this->retorno->datos=$resultado->fetchAll();
            } catch (PDOException $ex) {
                  $this->retorno->estado=false;
                  $this->retorno->mensaje="Problemas al listar ".$ex->getMessage();
                  $this->retorno->datos=null;
            }
             return $this->retorno;
      }
      
      //metodo para listar los materiales prestados de la base
      public function listarMantenimiento($idbase){
            try{
                  $consulta="select material.cod_barras as codigo, "
                          . "material.serial_equipo as serial, "
                          . "material.caracteristicas as caracteristica, "
                          . "tipo_material.nombre as nombreTipo, "
                          . "mantenimiento.numero_ticket as ticket,"
                          . "mantenimiento.fecha_ingreso as fechaIng, "
                          . "mantenimiento.observacion_fallo as obsFallo, "
                          . "material.*, tipo_material.*, mantenimiento.*, base.*, usuario.* "
                          . "from material inner join tipo_material on "
                          . "tipo_material.ID_tipo_material= material.ID_tipo "
                          . "INNER join mantenimiento on mantenimiento.ID_material = material.ID_material "
                          . "inner join usuario on usuario.ID_usuario = mantenimiento.ID_usuario "
                          . "inner join base on base.ID_base= usuario.ID_base "
                          . "where material.estado='Mantenimiento' and base.ID_base = ?";     

                  $resultado = $this->miConexion->prepare($consulta); 
                  $resultado->bindParam(1,$idbase);
                  $resultado->execute();
                  $this->retorno->estado=true;
                  $this->retorno->mensaje="Lista";
                  $this->retorno->datos=$resultado->fetchAll();
            } catch (PDOException $ex) {
                  $this->retorno->estado=false;
                  $this->retorno->mensaje="Problemas al listar ".$ex->getMessage();
                  $this->retorno->datos=null;
            }
             return $this->retorno;
      }
      
       //metod para lsiatr los materiales que han sido entregados a un usuario
      public function listarMaterialesEntregados($idbase){
            try{
                  $consulta="select entrega.fecha_entrega as fechaEntrega, "
                          . "entrega.observacion_entrega as observacionEntre, "
                          . "entrega.H_Usuariorecibe as hUsuarioEntre, "
                          . "entrega_detalle.grfs as grfsMaterial, "
                          . "tipo_material.nombre as tipoMaterial, material.cod_barras as codigoBarras,material.serial_equipo as serial, "
                          . "entrega.*,entrega_detalle.*, tipo_material.*, material.*, usuario.* "
                          . "from entrega inner join entrega_detalle on entrega_detalle.ID_entrega = entrega.ID_entrega "
                          . "inner join material on material.ID_material = entrega_detalle.ID_material "
                          . "inner join tipo_material on tipo_material.ID_tipo_material = material.ID_tipo "
                          . "inner join usuario on usuario.ID_usuario= entrega.ID_usuario where usuario.ID_base = ?";     

                  $resultado = $this->miConexion->prepare($consulta); 
                  $resultado->bindParam(1,$idbase);
                  $resultado->execute();
                  $this->retorno->estado=true;
                  $this->retorno->mensaje="Lista";
                  $this->retorno->datos=$resultado->fetchAll();
            } catch (PDOException $ex) {
                  $this->retorno->estado=false;
                  $this->retorno->mensaje="Problemas al listar ".$ex->getMessage();
                  $this->retorno->datos=null;
            }
             return $this->retorno;
      }
      
      //metodo para listar los materiales que estan siendo enviados a su base
      public function listarEnviadosBase($idbase){
            try{
                  $consulta="select material.cod_barras as codigo, "
                          . "material.serial_equipo as serial, "
                          . "material.caracteristicas as caracteristica, "
                          . "tipo_material.nombre as nombreTipo, "
                          . "envio_detalle.grfs as grfs, envio.Numero_guia as numeroGuia, "
                          . "envio.fecha_envio as fechaEnvio, envio.observa_envio as observacionEnvio, "
                          . "material.*, tipo_material.*, envio_detalle.*, envio.*, usuario.*, base.* "
                          . "from material inner join tipo_material "
                          . "on tipo_material.ID_tipo_material = material.ID_tipo "
                          . "inner join envio_detalle on envio_detalle.ID_material = material.ID_material "
                          . "inner join envio on envio.ID_envio= envio_detalle.ID_envio "
                          . "inner join usuario on usuario.ID_usuario = envio.ID_usuario "
                          . "inner join base on base.ID_base= usuario.ID_base where material.estado='Enviado' "
                          . "and base.ID_base = ?";     

                  $resultado = $this->miConexion->prepare($consulta); 
                  $resultado->bindParam(1,$idbase);
                  $resultado->execute();
                  $this->retorno->estado=true;
                  $this->retorno->mensaje="Lista";
                  $this->retorno->datos=$resultado->fetchAll();
            } catch (PDOException $ex) {
                  $this->retorno->estado=false;
                  $this->retorno->mensaje="Problemas al listar ".$ex->getMessage();
                  $this->retorno->datos=null;
            }
             return $this->retorno;
      }
      
      //metodo para listar todos los materiales de todas las bases
      public function listarTodos(){
            try{
                  $consulta="select tipo_material.nombre, material.ID_tipo as idTipo,material.estado as estado,"
                          . "base.nombre As nombreBase, material.ID_base as idBase, count(ID_tipo) as cantidadTipo "
                          . "from material inner join tipo_material on "
                          . "tipo_material.ID_tipo_material = material.ID_tipo "
                          . "inner join base on base.ID_base = material.ID_base group "
                          . "by tipo_material.nombre, material.estado, base.nombre";     

                  $resultado = $this->miConexion->prepare($consulta); 
                  $resultado->execute();
                  $this->retorno->estado=true;
                  $this->retorno->mensaje="Lista";
                  $this->retorno->datos=$resultado->fetchAll();
            } catch (PDOException $ex) {
                  $this->retorno->estado=false;
                  $this->retorno->mensaje="Problemas al listar ".$ex->getMessage();
                  $this->retorno->datos=null;
            }
             return $this->retorno;
      }
      
      //metodo para listar bogota
      public function listarPorBase($bases){
            try{
                  $consulta="select tipo_material.nombre, material.ID_tipo as idTipo,material.estado,base.nombre As nombreBase, "
                          . "material.ID_base as idBase, material.estado as estado, "
                          . "count(ID_tipo) as cantidadTipo from material inner join tipo_material "
                          . "on tipo_material.ID_tipo_material = material.ID_tipo inner "
                          . "join base on base.ID_base = material.ID_base where base.nombre= ? "
                          . "group by tipo_material.nombre, material.estado, base.nombre";     

                  $resultado = $this->miConexion->prepare($consulta);                
                  $resultado->bindParam(1,$bases);
                  $resultado->execute();
                  $this->retorno->estado=true;
                  $this->retorno->mensaje="Lista";
                  $this->retorno->datos=$resultado->fetchAll();
            } catch (PDOException $ex) {
                  $this->retorno->estado=false;
                  $this->retorno->mensaje="Problemas al listar ".$ex->getMessage();
                  $this->retorno->datos=null;
            }
             return $this->retorno;
      }
      
      //metodo para listar especificamente la informacion que esta en los inventarios 
      public function listarEspecifica($idTipo,$idBase,$estado){
            try{
                  $consulta="select tipo_material.nombre as nombreTipo, material.ID_material as idMaterial, "
                          . "material.ID_tipo,base.nombre As nombreBase, "
                          . "material.cod_barras as codigoBarras, "
                          . "material.ID_material,material.serial_equipo as serialEquipo, "
                          . "material.costo_grfs as costo, "
                          . "material.caracteristicas as caracteristi "
                          . "from material inner join tipo_material "
                          . "on tipo_material.ID_tipo_material = material.ID_tipo "
                          . "inner join base on base.ID_base = material.ID_base "
                          . "where tipo_material.ID_tipo_material= ? and material.ID_base=? and material.estado = ?";     

                  $resultado = $this->miConexion->prepare($consulta);                
                  $resultado->bindParam(1,$idTipo);
                  $resultado->bindParam(2,$idBase);
                  $resultado->bindParam(3,$estado);
                  $resultado->execute();
                  $this->retorno->estado=true;
                  $this->retorno->mensaje="Lista";
                  $this->retorno->datos=$resultado->fetchAll();
            } catch (PDOException $ex) {
                  $this->retorno->estado=false;
                  $this->retorno->mensaje="Problemas al listar ".$ex->getMessage();
                  $this->retorno->datos=null;
            }
             return $this->retorno;
      }
      

}


