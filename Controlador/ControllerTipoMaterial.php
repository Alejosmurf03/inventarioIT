<?php
session_start();
extract($_REQUEST);
include '../Modelo/conexion.php';
include '../Modelo/TipoMaterial.php';
include '../Modelo/ModelTipoMaterial.php';
error_reporting(0);
$modelTipoMaterial = new ModelTipoMaterial();

switch ($_REQUEST["accion"]){
    case "Agregar":
        $unTipoMaterial = new TipoMaterial($txtTipo);
        agregar($modelTipoMaterial ,$unTipoMaterial);
        break;

}

function agregar(ModelTipoMaterial $modelTipoMaterial , TipoMaterial $unTipoMaterial){
   
    $resultado = $modelTipoMaterial ->agregar($unTipoMaterial);
    echo json_encode($resultado);
}



?>