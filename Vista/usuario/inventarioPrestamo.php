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
        <title>Inventario Materiales Prestados</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">
                <h2>Materiales Prestados <?php echo $_SESSION["base"]; ?></h2>
                <div class="table-responsive" id="tabla">
                    <table id="tabla1" name="tabla1" class="table table-striped table-bordered " style="width:100%;">
                        <input type="hidden" name="accion" id="accion">
                        <thead id="thead">
                            <tr>
                                <td>Codigo De Barras</td>
                                <td>Serial</td>
                                <td>Tipo de Elemento</td>
                                <td>Fecha Prestamo</td>
                                <td>Fecha Entrega</td>
                                <td>H usuario prestado</td>
                                <td>Observacion prestamo</td>
                                <td>Observacion entrega</td>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr id="fila">
                                <td id="codigo"></td>
                                <td id="serial"></td>
                                <td id="tipoElemento"></td>
                                <td id="fechaPrestamo"></td>
                                <td id="fechaEntrega"></td>
                                <td id="hPrestado"></td>
                                <td id="observacionPrestamo"></td>
                                <td id="observacionEntrega"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="PDF/Inventario_Prestamo.php" target="_blank" class="btn btn-danger">Generar Reporte</a>
            </div>
        </div>
        <script type="text/javascript">
            listarPrestados();
        </script>
    </body>
</html>


