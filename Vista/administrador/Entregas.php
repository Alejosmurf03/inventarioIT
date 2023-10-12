<?php
include 'ValidacionUsuario.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <?php
        include '../../Librerias/extensiones.php';
        ?>
        <title>Entregas</title>
        <link href="../css/estiloEntregas.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../../js/Material.js"></script>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con2">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div id="margenbtn">
                        <div class="col-lg-6">

                            <center><a href="Entregas.php" id="a1"><button type="button" class="btn btn-block" id="btnrec" name="bteenv">gRFS enviado</button></a></center>
                        </div>
                        <div class="col-lg-6">

                            <center><a href="EntregaSinRQ.php" id="a1"><button type="button" class="btn btn-block" id="btnrec" name="btnrec">registrar gRFS</button></a></center>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="container" id="con1">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-12" id="margen">
                    <h2>Datos De Entrega</h2>
                    <form id="frmEntregaConRQ" name="frmEntregaConRQ" action="javascript: MaterialesEntregados();">
                        <input type="hidden" name="accion" id="accion">
                        <div class="form-group">
                            <label for="GRFS">gRFS</label>
                            <input id="txtGRFSRQ" name="txtGRFSRQ" type="text" class="form-control" placeholder="Example: RQ123456"/>
                        </div>
                        <div class="form-group">
                            <label for="USERRECIBE">User ID</label>
                            <input id="txtUsuarioRecibe" name="txtUsuarioRecibe" type="text" required="" class="form-control" placeholder="Usuario Que Recibe El Material"/>
                        </div>
                        <div class="form-group">
                            <label for="OBSERVACION ENTREGA">Observaciones De Entrega</label>
                            <textarea id="txtObserEntrega2" name="txtObserEntrega2" type="text" required="" class="form-control" placeholder="Observaciones De Entrega"></textarea>
                        </div>
                        <h2>Materiales</h2>
                        <div class="table-responsive" id="tabla">
                            <table id="tabla1" class="table table-striped table-bordered " style="width:100%;">
                                <thead id="thead">
                                    <tr>
                                        <td>Codigo De Barras</td>
                                        <td>Serial Del Equipo</td>
                                        <td>Tipo De Elemento</td>
                                        <td>Enviado Por</td>
                                        <td>Caracteristicas</td>
                                        <td>Comprobar</td>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <tr id="fila">
                                        <td id="codigobr"></td>
                                        <td id="serialeq"></td>
                                        <td id="tipoel"></td>
                                        <td id="enviado"></td>
                                        <td id="caracteristicama"></td>
                                        <td id="entregarmaterial"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group" id="btn1">
                            <center><input value="Entregar" id="MaterialesEntregados" name="MaterialesEntregados" type="submit" required="" class="btn btn-outline-dark"/></center>
                        </div>
                    </form>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>
</html>
