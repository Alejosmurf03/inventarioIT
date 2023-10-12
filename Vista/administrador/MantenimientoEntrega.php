<?php
include 'ValidacionUsuario.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/estiloDisposal2.css" rel="stylesheet" type="text/css"/>
        <link href="../../librerias/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <script src="../../js/jquery/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../../js/Material.js"></script>
        <title>Mantenimiento</title>
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

                            <center><a href="Mantenimiento.php" id="a1"><button type="button" class="btn btn-block" id="btnrec" name="bteenv">Mantenimiento</button></a></center>
                        </div>
                        <div class="col-lg-6">

                            <center><a href="MantenimientoEntrega.php" id="a1"><button type="button" class="btn btn-block" id="btnrec" name="btnrec">Entregar Usuario</button></a></center>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="container" id="con1">
            <div class="row">
                <div class="col-md-12" id="margen">
                    <form name="frmMantenimiento" id="frmMantenimiento">
                        <input type="hidden" name="accion" id="accion">
                        <h2>Mantenimiento Material(es)</h2>
                        <div class="container" id="div1">
                            <div class="row">                              
                                <div class="form-group col-md-12">
                                    <label for="COD_BARRAS">Codigo De Barras</label>
                                    <input id="txtCodigoBarraEntre" name="txtCodigoBarraEntre" type="number" required="" placeholder="Codigo de Barras" onkeypress="return numeros(event)"/>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" id="tabla">
                            <table id="tabla1" class="table table-striped table-bordered " style="width:100%;">
                                <thead id="thead">
                                    <tr>
                                        <td>Serial Del Equipo</td>
                                        <td>Tipo De Elemento</td>
                                        <td>Numero Ticket</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="txtSerial">
                                            <div id="txtSerial">
                                                <input type="text" name="txtSeriales" id="txtSeriales" disabled="disabled">
                                            </div>
                                        </td>
                                        <td id="txtTipo">
                                            <div id="txtTipo">
                                                <input type="text" name="txtTipos" id="txtTipos" disabled="disabled">
                                            </div>
                                        </td>
                                        <td id="txtTicket">
                                            <div id="txtTicket">
                                                <input type="text" name="txtTickets" id="txtTickets" disabled="disabled">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive" id="tabla">
                            <table id="tabla1" class="table table-striped table-bordered " style="width:100%;">
                                <thead id="thead">
                                    <tr>
                                        <td>Caracteristicas Del Equipo</td>
                                        <td>Observacion de mantenimiento</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="txtCaracte">
                                            <div id="txtCaracte">
                                                <input type="text" name="txtCaracteristicas" id="txtCaracteristicas" disabled="disabled">
                                            </div>           
                                        </td>
                                        <td id="txtObserPres">
                                            <div id="txtObserPres">
                                                <input type="text" name="txtObserPresta" id="txtObserPresta" disabled="disabled">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group">
                            <label for="OBSERVACION">Observaciones De Entrega al Usuario</label>
                            <textarea id="txtEntrega" name="txtEntrega" type="text"  class="form-control" placeholder="Observaciones De Entrega"></textarea>
                        </div>

                        <div class="form-group">
                            <center><button id="Entregar" name="Entregar" type="button" onclick="entregarUsuario()">Entregar</button></center>
                        </div>
                        <br>
                        <div id='mensaje' style="text-align: center"></div><br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
	
                //funcion para solo dejar ingresar numeros
					function numeros(e){
					    key = e.keyCode || e.which;
					    tecla = String.fromCharCode(key).toLowerCase();
					    letras = " 0123456789";
					    especiales = [8,37,39,46];
					 
					    tecla_especial = false
					    for(var i in especiales){
					 if(key == especiales[i]){
					     tecla_especial = true;
					     break;
					     } 
					  }
					 
					    if(letras.indexOf(tecla)==-1 && !tecla_especial){
					        return false;
					    }
					}

                        
	</script>
    </body>
</html>
