
<?php
include 'ValidacionUsuario.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <?php
        include '../../Librerias/extensiones.php';
        ?>
        <link href="../css/estiloInicio.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../../js/Inventario.js"></script>
        <title>Villavicencio</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>

        <div class="contendorInventario">
            <div class="contenedorGeneralBases">
                <h2> Bases</h2>
                <div class="conteBases">
                    <li class="btn-base">
                        <a href="Inventario.php">Nacionales</a>
                    </li>                   
                    <li class="btn-base">
                        <a href="InventarioBogota.php">Bogota</a>
                    </li> 
                    <li class="btn-base">
                        <a href="InventarioNeiva.php">Neiva</a>
                    </li>
                    <li class="btn-base">
                        <a href="InventarioYopal.php">Yopal</a>
                    </li>
                    <li class="btn-base">
                        <a href="InventarioVillavicencio.php">Villavicencio</a>
                    </li>
                    <li class="btn-base">
                        <a href="InventarioBarranca.php">Barranca</a>
                    </li>
                    <li class="btn-base">
                        <a href="InventarioCota.php">Cota</a>
                    </li>
                    <li class="btn-base">
                        <a href="InventarioPeru.php">Peru</a>
                    </li>
                </div>
            </div>
            <div class="contenedorTabla">
                <div id="HTMLtoPDF">
                    <h2>Materiales de las bases</h2>
                    <div class="container">
                        <div class="row">
                            <div class="table-responsive" id="tabla">
                                <table id="tabla1" name="tabla1" class="table table-striped table-bordered " style="width:100%;">
                                    <input type="hidden" name="accion" id="accion">
                                    <input type="hidden" name="txtBase" id="txtBase" value="Villavicencio">
                                    <thead id="thead">
                                        <tr>
                                            <td>Tipo Elemento</td>                            
                                            <td>Estado</td>
                                            <td>Cantidad</td>
                                            <td>Revisar</td>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <tr id="fila">
                                            <td id="tipo"></td>
                                            <td id="estado"></td>
                                            <td id="cantidad"></td>
                                            <td id="revisar" class="lupa"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><br>
                <a href="../../Vista/administrador/PDF/Inventario_villa.php" target="_blank" class="btn btn-danger">Generar Reporte</a>
            </div>
        </div>

        <script type="text/javascript">
                    listarPorBase();
        </script>
    </body>
</html>
