<?php
session_start();
extract($_REQUEST);
include '../Modelo/conexion.php';
include '../Modelo/Base.php';
include '../Modelo/ModelBase.php';
error_reporting(0);
$modelBase = new ModelBase();

switch ($_REQUEST["accion"]){
    case "Agregar":
        $unaBase = new Base($txtBase);
        agregar($modelBase,$unaBase);
        break;

}

function agregar(ModelBase $modelBase, Base $unaBase){
   
    $resultado = $modelBase->agregar($unaBase);
    echo json_encode($resultado);
}



?>