<?php
include 'ValidacionUsuario.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <?php
        include '../../Librerias/extensiones.php';
        ?>
        <link href="../css/estiloInventario.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../../js/Inventario.js"></script>
        <title>Inventario Materiales Entregados</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">

                <h2>Materiales Entregados a usuarios <?php echo $_SESSION["base"]; ?></h2>

                <div class="table-responsive" id="tabla">
                    <table id="tabla1" name="tabla1" class="table table-striped table-bordered " style="width:100%;">
                         <input type="hidden" name="accion" id="accion">
                        <thead id="thead">
                            <tr>
                                <td>Codigo De Barras</td>
                                <td>Serial</td>
                                <td>Tipo de Elemento</td>
                                <td>gRFS</td>
                                <td>Fecha entrega</td>
                                <td>H usuario recibio</td>
                                <td>Observacion entrega</td>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr id="fila">
                                <td id="codigo"></td>
                                <td id="serial"></td>
                                <td id="TipoElemento"></td>
                                <td id="gRFS"></td>
                                <td id="fechaEntrega"></td>
                                <td id="hUsuarioRecibe"></td>
                                <td id="observacionEntrega"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="PDF/Inventario_Entregado.php" target="_blank" class="btn btn-danger">Generar Reporte</a>
            </div>
        </div>
          <script type="text/javascript">
		    listarMaterialesEntregados();
	    </script>
    </body>
</html>



