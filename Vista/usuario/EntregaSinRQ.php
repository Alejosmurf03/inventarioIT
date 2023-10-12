<?php
include 'ValidacionUsuario.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Entrega</title>
        <link href="../css/estiloEntregas.css" rel="stylesheet" type="text/css"/>
        <link href="../../librerias/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/Funcionalidad.js" type="text/javascript"></script>
        <script src="../../js/jquery/jquery-3.3.1.min.js"></script>
        <script src="../../js/Material.js" type="text/javascript"></script>
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
                <div class="col-md-12" id="margen">
                    <h2>Datos De Entrega</h2>
                    <div class="container">
                        <form name="frmEntregaRQ" id="frmEntregaRQ" action="javascript: AgregarEntregaMaterialRQ();">
                            <input type="hidden" name="accion" id="accion">
                            <input type="hidden" name="idTemp" id="idTemp">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="USERRECIBE">User ID</label>
                                    <input id="txtUsuario" name="txtUsuario" type="text" class="form-control" required="" placeholder="Usuario Que Recibe El Material"/>
                                </div>
                                <div class="form-group">
                                    <label for="OBSERVACION ENTREGA">Observaciones De Entrega</label>
                                    <textarea id="txtObserEntrega" name="txtObserEntrega" type="text" class="form-control" required="" placeholder="Observaciones De Entrega"></textarea>
                                </div>
                                <h2>Material(es)</h2>
                                <div>
                                    <div class="form-group">
                                        <label for="COD_BARRAS">Codigo De Barras</label>
                                        <input id="txtCodigoBarraEntrega" name="txtCodigoBarraEntrega" type="text" class="form-control" placeholder="Codigo De Barras"/>
                                    </div>
                                </div>
                                <div class="container" id="div">
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label for="SERIAL">Serial</label>
                                            <input id="txtSeriales" name="txtSeriales" type="text" required="" class="form-control" disabled="" placeholder="Serial"/>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="Tipo">Tipo</label>
                                            <input id="txtTipos" name="txtTipos" type="text" required="" class="form-control" disabled="" placeholder="Tipo"/>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="GRFS">gRFS</label>
                                            <input id="txtGRFS" name="txtGRFS" type="text" class="form-control" placeholder="gRFS"/>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Confirmar</label><br>
                                            <button id="Confirmar_material" name="Confirmar_material" class="btn btn-danger" onclick="EntregaTemporal();listarMaterialesEntrega()" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive" id="tabla">
                                    <table id="tabla1" name="tabla1" class="table table-striped table-bordered " style="width:100%;">                                 
                                        <thead id="thead">
                                            <tr>
                                                <td>Codigo Barras</td>                            
                                                <td>Serial Equipo</td>
                                                <td>Tipo Elemento</td>
                                                <td>Caracteristicas</td>
                                                <td>Numero de gRFS</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <tr id="fila">
                                                <td id="codigo"></td>
                                                <td id="serial"></td>
                                                <td id="tipo"></td>
                                                <td id="caracteristicaMate"></td>
                                                <td id="gRFS"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group" id="btn1">
                                    <center><input value="Entregar Material" id="AgregarEntregaMaterialRQ" name="AgregarEntregaMaterialRQ" type="submit" required="" class="btn btn-outline-dark"/></center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
