<?php
session_start();
extract($_REQUEST);
include '../Modelo/conexion.php';
include '../Modelo/TipoMaterial.php';
include '../Modelo/ModelTipoMaterial.php';

$modelTipoMaterial = new ModelTipoMaterial();

$busqueda = $_REQUEST['term'];
$id=null;
// echo json_encode($listaFormulario->listaBase());

$tipoMaterial = new TipoMaterial();
$tipoMaterial->setIdTipoMaterial($id);
$tipoMaterial->setTipo($busqueda);


$contador=0;
$arrayTipoMaterial = array();
$tipoMaterial = $modelTipoMaterial->listaTipoMaterial($tipoMaterial);
// $canti = $tipoMaterial.length;
while($contador < count($tipoMaterial)){
    $arrayTipoMaterial[$contador]['id'] = $tipoMaterial[$contador]['ID_tipo_material'];
    $arrayTipoMaterial[$contador]['value'] = $tipoMaterial[$contador]['nombre'];

    $contador++;
}
echo json_encode($arrayTipoMaterial);
?>
