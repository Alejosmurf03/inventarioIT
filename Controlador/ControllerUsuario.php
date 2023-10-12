<?php
session_start();
extract($_REQUEST);
include '../Modelo/conexion.php';
include '../Modelo/ModelUsuario.php';
include '../Modelo/Usuario.php';
include '../Modelo/Base.php';
include '../Modelo/Rol.php';
error_reporting(0);
$listarRol = new ModelUsuario();
$listarBase = new ModelUsuario();
$unaBase = new Base();
$unRol = new Rol();
$unaBases = new Base();
$unRoles = new Rol();
$modelUsuario = new ModelUsuario();
$userID =$_SESSION['idUsuario'];


switch ($_REQUEST["accion"]){
    case "Agregar":
        $txtEstado = "Activo";
        $unaBase->setID_base($cbBases);
        $unRol->setID_rol($cbRol);   
        $unUsuario = new Usuario(strtoupper($txtH),$txtPassword,$txtNombre,$unRol, $unaBase, $txtEstado);
        agregar($modelUsuario,$unUsuario);
        break;
    case "listaBase":
        echo json_encode($listarBase->listaBase());
        break;
    case "listaRol":
        echo json_encode($listarRol->listaRol());
        break;
       case "Listar": listar($modelUsuario,$userID);
        break;
    case 'Inactivar':
        echo json_encode($modelUsuario->InactivoUsuario($idUsuario));
    break;
    case 'ObtenerUsuario':
        echo json_encode($modelUsuario->obtenerUsuario($idUsuario));
    break;
    case "Actualizar": 
        echo json_encode($modelUsuario->actualizarUsuario($nombre,$idBase,$idRol, $idUsuario));
     break;
     case 'ObtenerClave':
        echo json_encode($modelUsuario->obtenerClave($hUsuario,$clave));
    break;
    case "ActualizarClave":  
        actualizarClave($modelUsuario,$clave,$hUsuario);
        break;
     case "existeUsuario":
        echo json_encode($modelUsuario->validarUsuario($hUsuario));
    break;
   
  
}

function agregar(ModelUsuario $modelUsuario, Usuario $unUsuario){
   
    $resultado = $modelUsuario->agregar($unUsuario);
    echo json_encode($resultado);
}


function listar(ModelUsuario $modelUsuario, $userID){
    $resultado = $modelUsuario->listar($userID);
    echo json_encode($resultado);

}

function actualizarClave(ModelUsuario $modelUsuario,$clave,$hUsuario){
   
    $resultado = $modelUsuario->actualizarClave($clave,$hUsuario);
    echo json_encode($resultado);
}



?>