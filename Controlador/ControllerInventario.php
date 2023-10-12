<?php
session_start();
extract($_REQUEST);
include '../Modelo/conexion.php';
include '../Modelo/Material.php';
include '../Modelo/ModelInventario.php';
//error_reporting(0);
$base =$_SESSION['base']; 
$idbase =$_SESSION['IDbase'];
$modelInventario = new ModelInventario();

switch ($_REQUEST["accion"]){ 
    case "ListarActivos": listarActivos($modelInventario,$base);
        break;
    case "ListarInactivos": listarDisposal($modelInventario,$base);
        break;
    case "ListarPrestados": listarPrestados($modelInventario,$base);
        break;
    case "ListarEnviados": listarEnviados($modelInventario,$idbase);
        break;
    case "ListarMantenimiento": listarMantenimiento($modelInventario,$idbase);
        break;
    case "ListarEnvioBase": listarEnviadosBase($modelInventario,$idbase);
        break;
    case "ListarTodos": listarTodos($modelInventario);
        break;
    case "ListarPorBase": 
        echo json_encode($modelInventario->listarPorBase($bases));      
        break;
    case "ListarEspecifica": 
        echo json_encode($modelInventario->listarEspecifica($idTipo,$idBase,$estado)); 
        break;
    case "ListarEntregados": listarMaterialesEntregados($modelInventario,$idbase);
        break;
}

function listarActivos(ModelInventario $modelInventario, $base){
    $resultado = $modelInventario->listarActivos($base);
    echo json_encode($resultado);

}

function listarDisposal(ModelInventario $modelInventario, $base){
    $resultado = $modelInventario->listarDisposal($base);
    echo json_encode($resultado);

}

function listarPrestados(ModelInventario $modelInventario, $base){
    $resultado = $modelInventario->listarPrestados($base);
    echo json_encode($resultado);

}

function listarEnviados(ModelInventario $modelInventario, $idbase){
    $resultado = $modelInventario->listarEnviados($idbase);
    echo json_encode($resultado);

}

function listarMantenimiento(ModelInventario $modelInventario, $idbase){
    $resultado = $modelInventario->listarMantenimiento($idbase);
    echo json_encode($resultado);

}

function listarEnviadosBase(ModelInventario $modelInventario, $idbase){
    $resultado = $modelInventario->listarEnviadosBase($idbase);
    echo json_encode($resultado);

}

function listarTodos(ModelInventario $modelInventario){
    $resultado = $modelInventario->listarTodos();
    echo json_encode($resultado);

}


function listarMaterialesEntregados(ModelInventario $modelInventario, $idbase){
    $resultado = $modelInventario->listarMaterialesEntregados($idbase);
    echo json_encode($resultado);

}


?>