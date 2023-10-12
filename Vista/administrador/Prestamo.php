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
        <title>Prestamo</title>
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

                            <center><a href="Prestamo.php" id="a1"><button type="button" class="btn btn-block" id="btnrec" name="bteenv">PRESTAR</button></a></center>
                        </div>
                        <div class="col-lg-6">

                            <center><a href="Devolucion.php" id="a1"><button type="button" class="btn btn-block" id="btnrec" name="btnrec">RETORNAR</button></a></center>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="container" id="con1">
            <div class="row">
                <div class="col-md-12" id="margen">
                    <form name="frmPrestamo" id="frmPrestamo" action="javascript: agregarprestamo();">
                        <input type="hidden" name="accion" id="accion">
                        <h2>Prestamo Material</h2>
                        <div class="container" id="div1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="COD_BARRAS">Codigo De Barras</label>
                                        <br>
                                        <input id="txtCodigoBarra" name="txtCodigoBarra" type="number" required="" placeholder="Codigo de Barras" onkeypress="return numeros(event)"/>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" id="tabla">
                            <table id="tabla1" class="table table-striped table-bordered " style="width:100%;">
                                <thead id="thead">
                                    <tr>
                                        <td>Serial Del Equipo</td>
                                        <td>Tipo De Elemento</td>
                                        <td>Estado Del Equipo</td>
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
                                        <td id="txtEstado">
                                            <div id="txtEstado">
                                                <input type="text" name="txtEstados" id="txtEstados" disabled="disabled">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="txtCaracte">
                                            <div id="txtCaracte">
                                                <input type="text" name="txtCaracteristicas" id="txtCaracteristicas" disabled="disabled">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label for="USERRECIBE">ID usuario Presta</label>
                            <input id="txtH" name="txtH" type="text" required="" class="form-control" placeholder="Usuario Que se le presta"/>
                        </div>
                        <div class="form-group">
                            <label for="OBSERVACION">Observaciones De Prestamo</label>
                            <textarea id="txtDescripcion" name="txtDescripcion" type="text" required="" class="form-control" placeholder="Observaciones De Prestamo"></textarea>
                        </div>
                        <div class="form-group">
                            <center><input value="Prestar" id="AgregarP" name="AgregarP" type="submit" required="" class="btn"/></center>
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
