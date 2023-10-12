<?php

//metodo para agregar un material en la BD
class ModelMaterial {

    private $miConexion;
    private $retorno;

    public function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }

    public function agregar(Material $unMaterial) {
        try {
            $this->miConexion->beginTransaction();
            //agregar a la tabla material
            $consulta = "INSERT INTO material VALUES(null,?,?,?,?,?,?,CURRENT_DATE(),?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unMaterial->getCod_barras());
            $resultado->bindParam(2, $unMaterial->getIdUsuario());
            $resultado->bindParam(3, $unMaterial->getSerial());
            $resultado->bindParam(4, $unMaterial->getBase()->getID_base());
            $resultado->bindParam(5, $unMaterial->getIdTipo());
            $resultado->bindParam(6, $unMaterial->getCostoGrfs());
            $resultado->bindParam(7, $unMaterial->getcaracte());
            $resultado->bindParam(8, $unMaterial->getEstado());
           
            $resultado->execute();
            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Material agregado correctamente";
        } catch (PDOException $ex) {
            $this->miConexion->rollBack();
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas al agregar " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }

    //metodo para listar las bases que estan registradas en BD
    public function listaBase() {
        try {
            $consulta = "SELECT * FROM base";
            $resultado = $this->miConexion->prepare($consulta);

            $resultado->execute();
            $result = $resultado->fetchAll();
        } catch (Exception $ex) {
            echo "!ERROR¡" . $ex->getMessage() . "</br>";
        }
        return $result;
    }

    public function obtenerMaterial($codigoBarras) {
        try {
            $consulta = "SELECT material.ID_material AS idMaterial,
               material.cod_barras AS codigoMaterial, 
               material.costo_grfs AS costo, 
               material.estado AS estado,
               material.fecha_ingreso AS fechaIngreso, 
               material.serial_equipo AS serialEquipo,
               material.caracteristicas AS caracteristica,
               base.nombre AS base, tipo_material.nombre 
               AS nombreTipo, material.*, tipo_material.*, base.* 
               FROM material INNER JOIN tipo_material ON tipo_material.ID_tipo_material = material.ID_tipo 
               INNER JOIN base ON base.ID_base = material.ID_base
                WHERE material.cod_barras =?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $codigoBarras);
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Lista de Usuarios";
            $this->retorno->datos = $resultado->fetchAll();
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->mensaje = "Problemas al listar " . $ex->getMessage();
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }

    //funcion para agregar en la tabla disposal
    public function agregarDisposal(Disposal $unDisposal) {
        try {
            $this->miConexion->beginTransaction();
            //obtener id material
            $consulta = "SELECT ID_material from material where material.cod_barras = ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unDisposal->getMaterial()->getCod_barras());
            $resultado->execute();
            $idMaterial = $resultado->fetchColumn();
            
            //agregar en la tabla disposal
            $consulta = "INSERT INTO disposal VALUES(null,CURRENT_DATE(),?,?)";
            $resultado = $this->miConexion->prepare($consulta);      
            $resultado->bindParam(1, $idMaterial);
            $resultado->bindParam(2, $unDisposal->getObservacion());
            $resultado->execute();
            
            //actualizar la tabla material
            $consulta = "UPDATE material set material.estado = 'Inactivo' where material.ID_material= ?";
            $resultado = $this->miConexion->prepare($consulta); 
            $resultado->bindParam(1, $idMaterial);
            $resultado->execute();
            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Material en disposal.";
        } catch (PDOException $ex) {
            $this->miConexion->rollBack();
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas al actualizar " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }

    //metodo para prestar un material algun usuario de la base
    public function agregarprestamo(prestamo $unPrestamo, $codigoBarras) {
        try {
            $this->miConexion->beginTransaction();

            $consulta = "INSERT INTO prestamo(ID_prestamo,H_usuarioPresta,fecha_prestamo,descripcionPrestamo,ID_usuario) VALUES (null,?,CURRENT_DATE(),?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unPrestamo->getHUsuarioPresta());
            $resultado->bindParam(2, $unPrestamo->getDescripcion());
            $resultado->bindParam(3, $unPrestamo->getIdUsuario());
            $resultado->execute();

            $idPrestamo1 = $this->miConexion->lastInsertId(); //ultimo id de la base datos.

            $consulta = "SELECT material.ID_material FROM material WHERE material.cod_barras = ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $codigoBarras);
            $resultado->execute();
            $idMaterial = $resultado->fetchColumn();

            //agregar a la tabla pivote
            $consulta = "INSERT INTO prestamo_has_material VALUES(null,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idPrestamo1);
            $resultado->bindParam(2, $idMaterial);
            $resultado->execute();

            $consulta = "UPDATE material SET material.estado = 'Prestado' WHERE material.cod_barras = ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $codigoBarras);
            $resultado->execute();

            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Prestamo agregado correctamente";
        } catch (PDOException $ex) {
            $this->miConexion->rollBack();
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas al agregar " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }

    //metodo para valida que el codigo de barras no se repita
    public function validarCodigo($codigoBarra) {
        try {
            $consulta = "select * from material where material.cod_barras= ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $codigoBarra);
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "clave";
            $this->retorno->datos = $resultado->fetchAll();
        } catch (PDOException $ex) {
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }

    //metodo para valida que el serial no se repita
    public function validarSerial($serial) {
        try {
            $consulta = "select * from material where material.serial_equipo= ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $serial);
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "clave";
            $this->retorno->datos = $resultado->fetchAll();
        } catch (PDOException $ex) {
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }

    //metodo para cuando se entrega a la oficina un material que ha sido prestado
    public function retornar($descripcionEntrega,$codigoBarras) {
        try {
            $consulta = "SELECT material.ID_material FROM prestamo_has_material 
                        INNER JOIN material on prestamo_has_material.ID_material = material.ID_material 
                        WHERE material.estado = 'Prestado' AND material.cod_barras = ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $codigoBarras);
            $resultado->execute();
            $idMaterial = $resultado->fetchColumn();

            $consulta = "UPDATE prestamo inner join prestamo_has_material on prestamo_has_material.ID_prestamo= prestamo.ID_prestamo 
                        inner join material on material.ID_material= prestamo_has_material.ID_material 
                        set prestamo.fecha_entrega=CURRENT_DATE(), material.estado ='Recibido',prestamo.descripcionEntrega=? where material.ID_material= ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $descripcionEntrega);
            $resultado->bindParam(2, $idMaterial);
            $resultado->execute();
            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Agregado correctamente";
        } catch (PDOException $ex) {
            $this->miConexion->rollBack();
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas al actualizar " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }
    
    
   //metdo para agregar en la tabla manetenimiento un material
public function Mantenimiento(Mantenimiento $unMantenimiento, $codigoBarras) {
        try {
            $this->miConexion->beginTransaction();
            //obtener id material
            $consulta = "SELECT id_Material from material where material.cod_barras = ?";
            $resultado = $this->miConexion->prepare($consulta);
            //$resultado->bindParam(1, 8); 
            $resultado->bindParam(1, $codigoBarras);
            $resultado->execute();
            $idMaterial2 = $resultado->fetchColumn();

            //agregar en la tabla mantenimiento
            $consulta = "INSERT INTO mantenimiento VALUES(null,?,CURRENT_DATE(),'',?,'',?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            //$resultado->bindParam(1, 8); 
            $resultado->bindParam(1, $unMantenimiento->getnumero_ticket());
            $resultado->bindParam(2, $unMantenimiento->getobservacion_fallo());
            $resultado->bindParam(3, $unMantenimiento->getidUsuario());
            $resultado->bindParam(4, $idMaterial2);
            $resultado->execute();

            //actualizar la tabla material
            $consulta = "UPDATE material set material.estado = 'Mantenimiento' where material.cod_barras = ?";
            $resultado = $this->miConexion->prepare($consulta);
            //$resultado->bindParam(1, 8); 
            $resultado->bindParam(1, $codigoBarras);
            $resultado->execute();

            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Material en mantenimiento.";
        } catch (PDOException $ex) {
            $this->miConexion->rollBack();
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas al agregar " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }
    
    
    
   //metedo para entregar a un usaurio un computador que estaba en mantenimiento
public function EntregarUsuario($codigoBarras, $observacion) {
        try {
            $this->miConexion->beginTransaction();
            //obtener id material
            $consulta = "SELECT mantenimiento.ID_material FROM mantenimiento "
                    . "INNER JOIN material on mantenimiento.ID_material = material.ID_material "
                    . "WHERE material.estado = 'Mantenimiento' AND material.cod_barras =?" ;
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $codigoBarras);
            $resultado->execute();
            $idMaterial = $resultado->fetchColumn();

            //modificar la tabla mantenimiento y material
            $consulta = "UPDATE mantenimiento INNER JOIN material "
                    . "on mantenimiento.ID_material = material.ID_material SET mantenimiento.fecha_retorno = CURRENT_DATE(), "
                    . "material.estado = 'Asignado', mantenimiento.observacion_entrega = ? WHERE material.ID_material = ?";
            $resultado = $this->miConexion->prepare($consulta);
            //$resultado->bindParam(1, 8); 
            $resultado->bindParam(1, $observacion);
            $resultado->bindParam(2, $idMaterial);
            $resultado->execute();

            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "actualizacion.";
        } catch (PDOException $ex) {
            $this->miConexion->rollBack();
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas al actualizar " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }
    
    
    //metodo para mostra la informacion de un  material cuando ingreso a mantenimiento
    public function obtenerMaterialMantenimiento($codigoBarras) {
        try {
            $consulta = "SELECT material.ID_material AS idMaterial, "
                    . "material.cod_barras AS codigoMaterial, material.serial_equipo AS serialEquipo, "
                    . "material.estado AS estadoMaterial, material.caracteristicas AS caracteristica, "
                    . "tipo_material.nombre AS nombreTipo, mantenimiento.numero_ticket AS numeroTicket, "
                    . "mantenimiento.observacion_fallo AS observacionFallo, material.*, tipo_material.*, "
                    . "mantenimiento.* FROM material INNER JOIN tipo_material ON tipo_material.ID_tipo_material = material.ID_tipo "
                    . "inner join mantenimiento on mantenimiento.ID_material = material.ID_material WHERE material.cod_barras = ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $codigoBarras);
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Lista";
            $this->retorno->datos = $resultado->fetchAll();
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->mensaje = "Problemas " . $ex->getMessage();
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }


    
    //metodo par agregar en la tabla envio y en la tabla envio detalle dond evan todos los materiales con grfs
    public function AgregarEnvio(Envio $unEnvio) {
        try {
            $this->miConexion->beginTransaction();
            //obtener id material
            $consulta = "INSERT INTO envio VALUES(null,?,CURRENT_DATE(),?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unEnvio->getNumeroGuia());
            $resultado->bindParam(2, $unEnvio->getBase()->getID_base());
            $resultado->bindParam(3, $unEnvio->getObservacion());
            $resultado->bindParam(4, $unEnvio->getUsuario());
            $resultado->bindParam(5, $unEnvio->getHUsuarioEnvia());
            $resultado->execute();
            $idEnvio = $this->miConexion->lastInsertId();

            //agregar en la tabla envio detalle
            $consulta = "insert into envio_detalle(ID_envio, ID_material,grfs) "
                    . "SELECT ?,ID_material,grfs from envio_detalle_temp "
                    . "where envio_detalle_temp.ID_temp= CURRENT_DATE()";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idEnvio);
            $resultado->execute();
            //eliminar todos los materiales que van hacer enviados
            $consulta = "DELETE FROM envio_detalle_temp where envio_detalle_temp.ID_temp= CURRENT_DATE()";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->execute();
            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Agregar.";
         
        } catch (PDOException $ex) {
            $this->miConexion->rollBack();
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }
    
    //metodo para agregar en la tabal de envio temporal
    public function agregarEnvioTem($codigoMate, $grfs) {
        try {
            $this->miConexion->beginTransaction();
             $consulta = "SELECT material.ID_material from material WHERE material.cod_barras= ?" ;
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $codigoMate);
            $resultado->execute();
            $idMaterial = $resultado->fetchColumn();
            //agregar a la tabla envio_detalle_temp
            $consulta = "INSERT INTO envio_detalle_temp VALUES(CURRENT_DATE(),?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idMaterial);
            $resultado->bindParam(2, $grfs);
            $resultado->execute();
            
            //modificar la tabla material el estado por enviado
            $consulta = "update material set material.estado = 'Enviado' WHERE material.ID_material = ?";
            $resultado = $this->miConexion->prepare($consulta);
            //$resultado->bindParam(1, 8); 
            $resultado->bindParam(1, $idMaterial);
            $resultado->execute();
            
            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Modificacion correcta";
            
        } catch (PDOException $ex) {
            $this->miConexion->rollBack();
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }
    
    //Mostrar todos los materiales que se estan enviando
    public function listarMaterialesEnvio(){
            try{
                  $consulta="SELECT material.ID_material AS idMaterial, "
                          . "material.cod_barras AS codigoMaterial, "
                          . "material.serial_equipo AS serialEquipo, "
                          . "material.caracteristicas AS caracteristica, "
                          . "tipo_material.nombre AS nombreTipo, "
                          . "envio_detalle_temp.grfs As gRFS,envio_detalle_temp.ID_temp As idTemp, material.*, tipo_material.*, "
                          . "envio_detalle_temp.* FROM material "
                          . "INNER JOIN tipo_material "
                          . "ON tipo_material.ID_tipo_material = material.ID_tipo "
                          . "INNER JOIN envio_detalle_temp on envio_detalle_temp.ID_material = material.ID_material";     

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


      
      //metodo para listar materiales que se van a recibir 
       public function listarMaterialesRecibir($numeroGuia,$Idbase){
            try{
                  $consulta="select envio.Numero_guia AS numeroGuia, envio.fecha_envio AS fechaEnvio, "
                          . "envio.observa_envio as observacionEnvio, envio_detalle.ID_material AS idMaterial, "
                          . "envio_detalle.ID_envio AS idEnvio, envio_detalle.grfs as grfs, material.cod_barras AS codigoMaterial, material.serial_equipo AS serial, material.caracteristicas as caracteristicas, "
                          . "material.estado as estado, tipo_material.nombre as tipoMaterial, "
                          . "base.ID_base as Idbase,base.nombre as nombreBase, envio.*, envio_detalle.*, tipo_material.*, material.*, base.* "
                          . "from envio inner join envio_detalle on envio_detalle.ID_envio = envio.ID_envio "
                          . "inner join material on material.ID_material = envio_detalle.ID_material "
                          . "inner join tipo_material on tipo_material.ID_tipo_material = material.ID_tipo "
                          . "inner join base on envio.ID_base_destino = base.ID_base "
                          . "where envio.Numero_guia = ? and material.estado= 'Enviado' and base.ID_base = ?";     

                  $resultado = $this->miConexion->prepare($consulta); 
                  $resultado->bindParam(1, $numeroGuia);
                  $resultado->bindParam(2, $Idbase);
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
      
      //metodo para aprobar que se ha recibido un material
       public function recibirMateriales($idMateri){
            try{
                  $consulta="UPDATE material set material.estado = 'Recibido' where material.ID_material=?";     
                  $resultado = $this->miConexion->prepare($consulta); 
                  $resultado->bindParam(1, $idMateri);
                  $resultado->execute();
                  $this->retorno->estado=true;
                  $this->retorno->mensaje="Recibido";
            } catch (PDOException $ex) {
                  $this->retorno->estado=false;
                  $this->retorno->mensaje="Problemas ".$ex->getMessage();
                  $this->retorno->datos=null;
            }
             return $this->retorno;
      }
      
      
      //metodo para agregar en la tabla recibido los materiales que llegaron a la base, registrar que fecha llegaron y quien los recibio
    public function MaterialesRecibido($numeroGuia, $idUsuario) {
        try {
            $this->miConexion->beginTransaction();
            //obtener id envio
            $consulta = "SELECT envio.ID_envio from envio where envio.Numero_guia=?" ;
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $numeroGuia);
            $resultado->execute();
            $idEnvio = $resultado->fetchColumn();

            //enviar los datos a la tabla recibir envio
            $consulta = "INSERT INTO recibir_envio VALUES(null,?,?,CURRENT_DATE())";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idEnvio);
            $resultado->bindParam(2, $idUsuario);
            $resultado->execute();

            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "envio recibido.";
        } catch (PDOException $ex) {
            $this->miConexion->rollBack();
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }
    
    
     //metodo para mostra la informacion de un  material para actualizarlas y/o modificarla
    public function obtenerMaterialActualizar($idMateriales) {
        try {
            $consulta = "SELECT material.ID_material AS idMaterial,material.ID_tipo as idTipo, "
                    . " material.cod_barras AS codigoMaterial, "
                    . "material.serial_equipo AS serialEquipo, material.costo_grfs as Costo, "
                    . "material.caracteristicas AS caracteristica, "
                    . "tipo_material.nombre AS nombreTipo, "
                    . "material.*, tipo_material.* FROM material "
                    . "INNER JOIN tipo_material "
                    . "ON tipo_material.ID_tipo_material = material.ID_tipo "
                    . "WHERE material.ID_material = ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idMateriales);
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Lista";
            $this->retorno->datos = $resultado->fetchAll();
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->mensaje = "Problemas " . $ex->getMessage();
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }
    
    
    
  //actualizar un material
  public function actualizarMaterial($codigo,$idTipo, $costo, $caracteristicas,$idMateriales){
        try{
             $this->miConexion->beginTransaction();
             //actualizar a la tabla usuario
               $consulta="UPDATE `material` SET `cod_barras` = ?, `ID_tipo` = ?,`costo_grfs` = ?,`caracteristicas` = ? WHERE `material`.`ID_material` = ?";
            $resultado= $this->miConexion->prepare($consulta);
            $resultado->bindParam(1,$codigo);
            $resultado->bindParam(2,$idTipo);
            $resultado->bindParam(3, $costo);
            $resultado->bindParam(4, $caracteristicas);
            $resultado->bindParam(5, $idMateriales);
            $resultado->execute();
            $this->miConexion->commit();
            $this->retorno->estado=true;
            $this->retorno->mensaje="material actualizado correctamente";

        }catch(PDOException $ex){
            $this->miConexion->rollBack();
            $this->retorno->estado=FALSE;
            $this->retorno->mensaje="problemas al actualizar ".$ex->getMessage();
            $this->retorno->datos=NULL;
        }
        return $this->retorno;
    }


    //metodo para agregar un pedido de un material que esta en la base
    public function AgregarEntregaMaterialRQ(EntregaMaterial $unaEntrega) {
        try {
            $this->miConexion->beginTransaction();
            //obtener id material
            $consulta = "INSERT INTO entrega(`ID_entrega`, `fecha_entrega`, `ID_usuario`, `observacion_entrega`, `H_Usuariorecibe`) VALUES(null,CURRENT_DATE(),?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unaEntrega->getUnUsuario());
            $resultado->bindParam(2, $unaEntrega->getObservacion());
            $resultado->bindParam(3, $unaEntrega->getHUsuarioEntrega());
            $resultado->execute();
            $idEntrega = $this->miConexion->lastInsertId();

            //agregar en la tabla envio detalle
            $consulta = "insert into entrega_detalle(ID_entrega, ID_material,grfs) "
                    . "SELECT ?,ID_material,grfs from entrega_detalle_temp "
                    . "where entrega_detalle_temp.ID_temp= CURRENT_DATE()";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idEntrega);
            $resultado->execute();
            //eliminar todos los materiales que van hacer enviados
            $consulta = "DELETE FROM entrega_detalle_temp where entrega_detalle_temp.ID_temp= CURRENT_DATE()";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->execute();
            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Agregar.";
        } catch (PDOException $ex) {
            $this->miConexion->rollBack();
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }

    //metodo para agregar en la tabla temporal que es donde va ir la informacion de la entrega y que material se le entreg
    public function agregarEntregaTem($codigoMate, $grfs) {
        try {
            $this->miConexion->beginTransaction();
            $consulta = "SELECT material.ID_material from material WHERE material.cod_barras= ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $codigoMate);
            $resultado->execute();
            $idMaterial = $resultado->fetchColumn();
            //agregar a la tabla envio_detalle_temp
            $consulta = "INSERT INTO entrega_detalle_temp VALUES(CURRENT_DATE(),?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idMaterial);
            $resultado->bindParam(2, $grfs);
            $resultado->execute();

            //modificar la tabla material el estado por enviado
            $consulta = "update material set material.estado = 'Asignado' WHERE material.ID_material = ?";
            $resultado = $this->miConexion->prepare($consulta);
            //$resultado->bindParam(1, 8); 
            $resultado->bindParam(1, $idMaterial);
            $resultado->execute();

            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Modificacion correcta";
        } catch (PDOException $ex) {
            $this->miConexion->rollBack();
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }

//metodo para listar los materiales que van a ser entregados al usuario a medida que se registra con que rq se entrega
    public function listarMaterialesEntrega() {
        try {
            $consulta = "SELECT material.ID_material AS idMaterial, "
                    . "material.cod_barras AS codigoMaterial, "
                    . "material.serial_equipo AS serialEquipo, "
                    . "material.caracteristicas AS caracteristica, "
                    . "tipo_material.nombre AS nombreTipo, "
                    . "entrega_detalle_temp.grfs As gRFS,entrega_detalle_temp.ID_temp As idTemp, material.*, tipo_material.*, "
                    . "entrega_detalle_temp.* FROM material "
                    . "INNER JOIN tipo_material "
                    . "ON tipo_material.ID_tipo_material = material.ID_tipo "
                    . "INNER JOIN entrega_detalle_temp on entrega_detalle_temp.ID_material = material.ID_material";

            $resultado = $this->miConexion->prepare($consulta);
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Lista";
            $this->retorno->datos = $resultado->fetchAll();
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->mensaje = "Problemas al listar " . $ex->getMessage();
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }

    //metodo para listar los materiales que se van entregar y han sido enviados
    public function listarMaterialesEntregaRQ($numeroGrfs) {
        try {
            $consulta = "SELECT material.ID_material AS idMaterial,
                                material.cod_barras AS codigobr,
                                material.serial_equipo AS  serialeq,
                                tipo_material.nombre AS tipoel,
                                usuario.ID_H AS enviado,
                                material.caracteristicas AS caracteristicama,
                                material.estado AS estado,
                                envio_detalle.grfs
                        FROM    material INNER JOIN tipo_material ON material.ID_tipo=tipo_material.ID_tipo_material
                                INNER JOIN envio_detalle ON envio_detalle.ID_material=material.ID_material
                                INNER JOIN envio ON envio.ID_envio=envio_detalle.ID_envio
                                INNER JOIN usuario ON usuario.ID_usuario=envio.ID_usuario
                        WHERE   material.estado='Recibido' AND envio_detalle.grfs = ?";

            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $numeroGrfs);
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Lista";
            $this->retorno->datos = $resultado->fetchAll();
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->mensaje = "Problemas al listar " . $ex->getMessage();
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }

//metodo para que cambue el estado del material que ya ha sido entregado
    public function EntregarMaterialesRQ($idMateri) {
        try {
            $consulta = "UPDATE material set material.estado = 'Asignado' where material.ID_material=?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idMateri);
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Entregado";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->mensaje = "Problemas " . $ex->getMessage();
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }

    //metod para guardar toda la informacion d eun material ya entregado que fecha y demas, estos materiales son los que han sido enviados

    public function MaterialesEntregados(EntregaMaterial $unaEntrega1, $numeroGrfs) {
        try {
            $this->miConexion->beginTransaction();
            
            $consulta = "SELECT envio_detalle.ID_material FROM envio_detalle WHERE envio_detalle.grfs = ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $numeroGrfs);
            $resultado->execute();
            $idmaterial = $resultado->fetchColumn();

            $consulta = "SELECT envio_detalle.grfs FROM envio_detalle WHERE envio_detalle.grfs = ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $numeroGrfs);
            $resultado->execute();
            $grfs = $resultado->fetchColumn();
            
            $consulta = "INSERT INTO entrega(`ID_entrega`, `fecha_entrega`, `ID_usuario`, `observacion_entrega`, `H_Usuariorecibe`) VALUES(null,CURRENT_DATE(),?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unaEntrega1->getUnUsuario());
            $resultado->bindParam(2, $unaEntrega1->getObservacion());
            $resultado->bindParam(3, $unaEntrega1->getHUsuarioEntrega());
            $resultado->execute();
            $idEntrega = $this->miConexion->lastInsertId();

            //enviar los datos a la tabla entrega_detalle
            $consulta = "INSERT INTO `entrega_detalle`(ID_entrega, ID_material, grfs) VALUES (?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idEntrega);
            $resultado->bindParam(2, $idmaterial);
            $resultado->bindParam(3, $grfs);
            $resultado->execute();

            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "envio recibido.";
        } catch (PDOException $ex) {
            $this->miConexion->rollBack();
            $this->retorno->estado = FALSE;
            $this->retorno->mensaje = "problemas " . $ex->getMessage();
            $this->retorno->datos = NULL;
        }
        return $this->retorno;
    }



}


