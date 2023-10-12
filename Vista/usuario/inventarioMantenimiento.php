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
        <title>Inventario Materiales Mantenimiento</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">
                <h2>Materiales Disponibles <?php echo $_SESSION["base"]; ?></h2>
                <div class="table-responsive" id="tabla">
                    <table id="tabla1" name="tabla1" class="table table-striped table-bordered " style="width:100%;">
                        <input type="hidden" name="accion" id="accion">
                        <thead id="thead">
                            <tr>
                                <td>Codigo Barras</td>
                                <td>Serial</td>
                                <td>Tipo Elemento</td>
                                <td>Caracteristicas</td>
                                <td>Numero ticket</td>
                                <td>Fecha ingreso</td>
                                <td>Observacion fallo</td>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr id="fila">
                                <td id="codigo"></td>
                                <td id="serial"></td>
                                <td id="tipoElemento"></td>
                                <td id="caracte"></td>
                                <td id="numTicket"></td>
                                <td id="fechaIngreso"></td>
                                <td id="obFallo"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--<a href="../../Vista/usuario/PDF/Inventario_Disponible.php" target="_blank" class="btn btn-danger">Generar Reporte</a>-->
            </div>
        </div>
        <script type="text/javascript">
          listarMantenimiento();
        </script>
    </body>
</html>

