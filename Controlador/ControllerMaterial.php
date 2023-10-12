<?php
session_start();
extract($_REQUEST);
include '../Modelo/conexion.php';
include '../Modelo/Material.php';
include '../Modelo/Mantenimiento.php';
include '../Modelo/Disposal.php';
include '../Modelo/Envio.php';
include '../Modelo/ModelMaterial.php';
include '../Modelo/prestamo.php';
include '../Modelo/Base.php';
include '../Modelo/EntregaMaterial.php';
error_reporting(0);
$listaFormulario = new ModelMaterial();
$modelMaterial = new ModelMaterial();
$idMaterial = new ModelMaterial();
$unaBase = new Base();
$unBase = new Base();
$unMaterial = new Material();
$unaEntrega = new EntregaMaterial();
$unaEntrega1 = new EntregaMaterial();
$unEnvio = new Envio();
$unoMaterial = new Material();
$userID =$_SESSION['idUsuario']; 
$base =$_SESSION['base']; 

switch ($_REQUEST["accion"]){
    case "Agregar":
        $txtEstado = "Activo";
        $unaBase->setID_base($cbBases);
        $unMaterial = new Material($txtCodigoBarras, $userID, $txtSerial, $unaBase, $txtIdTipo, $txtcosto,$txtCaract,$txtEstado);
        agregar($modelMaterial,$unMaterial);
        break;
    case "listaBase":
        echo json_encode($listaFormulario->listaBase());
        break;
    case "ObtenerMaterial":
        echo json_encode($modelMaterial->obtenerMaterial($codigoBarras));
    break;
    case "AgregarDisposal":
        $unoMaterial->setCod_barras($txtCodigoBarrasMa);
        $unDisposal = new Disposal($unoMaterial, $txtObservacion);
        agregarDisposal($modelMaterial,$unDisposal);
        break; 
     case "agregarprestamo":
        $codigoBarras = $txtCodigoBarra;
        $unPrestamo = new prestamo($txtH, NULL, $txtDescripcion, $userID);
        agregarprestamo($modelMaterial, $unPrestamo, $codigoBarras);
        break;
    case "existeCodigoBarras":
        echo json_encode($modelMaterial->validarCodigo($codigoBarras));
    break;
    case "existeSerial":
        echo json_encode($modelMaterial->validarSerial($serial));
    break;
    case 'retornar':
        echo json_encode($modelMaterial->retornar($descripcionEntrega,$codigoBarras));
     break;
    case "Mantenimiento":
        $codigoBarras = $txtCodigoBarraMa;
        $unMantenimiento = new Mantenimiento($txtTicket, $txtMantenimiento, NULL, $userID);
        Mantenimiento($modelMaterial, $unMantenimiento, $codigoBarras);
    break;
    case 'EntregarUsuario':
        echo json_encode($modelMaterial->EntregarUsuario($codigoBarras,$observacionEntrega));
     break;
    case "ObtenerMaterialMantenimiento":
        echo json_encode($modelMaterial->obtenerMaterialMantenimiento($codigoBarras));
    break;
     case "AgregarEnvioTem":
        echo json_encode($modelMaterial->agregarEnvioTem($codigoMate, strtoupper($grfs)));
    break;
    case "listaMaterialesEnvio":
        echo json_encode($modelMaterial->listarMaterialesEnvio());
    break;
    case "AgregarEnvio":
        $unBase->setID_base($cbBases);
        $unEnvio = new Envio($txtNumeroGuia, $unBase, $txtObservacion, $userID, strtoupper($HUEnvia));
        AgregarEnvio($modelMaterial,$unEnvio);
    break;
    case "listaRecibirEnvio":
        echo json_encode($modelMaterial->listarMaterialesRecibir($numeroGuia,$Idbase));
    break;
    case "RecibirMaterial":
        echo json_encode($modelMaterial->recibirMateriales($idMateri));
    break;
    case "RecibirEnvio":
        echo json_encode($modelMaterial->MaterialesRecibido($numeroGuia,$userID));
    break;
    case "ObtenerMaterialActualizar":
        echo json_encode($modelMaterial->obtenerMaterialActualizar($idMateriales));
    break;
    case "ActualizarMaterial": 
        echo json_encode($modelMaterial->actualizarMaterial($codigo,$idTipo, $costo, $caracteristicas,$idMateriales));
     break;
      case "AgregarEntregaTem":
        echo json_encode($modelMaterial->agregarEntregaTem($codigoMate, strtoupper($grfs)));
        break;
    case "listarMaterialesEntrega":
        echo json_encode($modelMaterial->listarMaterialesEntrega());
        break;
    case "AgregarEntregaMaterialRQ":
        $unaEntrega = new EntregaMaterial($userID, $txtObserEntrega, $txtUsuario);
        AgregarEntregaMaterialRQ($modelMaterial, $unaEntrega);
        break;
    case "listarMaterialesEntregaRQ":
        echo json_encode($modelMaterial->listarMaterialesEntregaRQ(strtoupper($numeroGrfs)));
        break;
    case "EntregarMaterialesRQ":
        echo json_encode($modelMaterial->EntregarMaterialesRQ($idMateri));
        break;
    case "MaterialesEntregados":
        $unaEntrega1 = new EntregaMaterial($userID, $txtObserEntrega2, $txtUsuarioRecibe);
        MaterialesEntregados($modelMaterial, $unaEntrega1, strtoupper($numeroGrfs));
        break;

}

function agregar(ModelMaterial $modelMaterial, Material $unMaterial){
   
    $resultado = $modelMaterial->agregar($unMaterial);
    echo json_encode($resultado);
}

function agregarDisposal(ModelMaterial $modelMaterial, Disposal $unDisposal){
   
    $resultado = $modelMaterial->agregarDisposal($unDisposal);
    echo json_encode($resultado);
}


function agregarprestamo(ModelMaterial $modelMaterial, prestamo $unPrestamo,  $codigoBarras) {

    $resultado = $modelMaterial->agregarprestamo($unPrestamo, $codigoBarras );
    echo json_encode($resultado);
}


function Mantenimiento(ModelMaterial $modelMaterial, $unMantenimiento, $codigoBarras) {
    $resultado = $modelMaterial->Mantenimiento($unMantenimiento, $codigoBarras);
    echo json_encode($resultado);
}

//metodo para agregar en envio y para agregar en detalles del envio, que materiales se envian con grfs
function agregarEnvio(ModelMaterial $modelMaterial, Envio $unEnvio){
   
    $resultado = $modelMaterial->AgregarEnvio($unEnvio);
    echo json_encode($resultado);
}

function AgregarEntregaMaterialRQ(ModelMaterial $modelMaterial, EntregaMaterial $unaEntrega) {
    $resultado = $modelMaterial->AgregarEntregaMaterialRQ($unaEntrega);
    echo json_encode($resultado);
}

function MaterialesEntregados(ModelMaterial $modelMaterial, EntregaMaterial $unaEntrega1, $numeroGrfs) {
    $resultado = $modelMaterial->MaterialesEntregados($unaEntrega1, $numeroGrfs);
    echo json_encode($resultado);
}

?>