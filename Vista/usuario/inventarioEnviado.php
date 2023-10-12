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
        <title>Inventario Materiales Enviados</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">

                <h2>Materiales Enviados <?php echo $_SESSION["base"]; ?></h2>

                <div class="table-responsive" id="tabla">
                    <table id="tabla1" class="table table-striped table-bordered " style="width:100%;">
                          <input type="hidden" name="accion" id="accion">
                        <thead id="thead">
                            <tr>
                                <td>Codigo De Barras</td>
                                <td>Serial</td>
                                <td>Tipo de Elemento</td>
                                <td>Caracteristicas</td>
                                <td>Numero Guia</td>
                                <td>gRFS</td>
                                <td>Fecha envio</td>
                                <td>Fecha recibido</td>
                                <td>Estado</td>
                                <td>Base envio</td>
                                <td>Observacion Envio</td>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr id="fila">
                                <td id="codigo"></td>
                                <td id="serial"></td>
                                <td id="tipoElemento"></td>
                                <td id="caracteristica"></td>
                                <td id="numeroGuia"></td>
                                <td id="gRFS"></td>
                                <td id="fechaEnvio"></td>
                                <td id="fechaRecibido"></td>
                                <td id="estado"></td>
                                <td id="baseEnvio"></td>
                                <td id="observacionEnvio"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="PDF/Inventario_Enviado.php" target="_blank" class="btn btn-danger">Generar Reporte</a>
            </div>
        </div>
         <script type="text/javascript">
		    listarEnviados();
	 </script>
    </body>
</html>


