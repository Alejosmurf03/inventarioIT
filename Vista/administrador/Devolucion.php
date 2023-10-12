<?php
include 'ValidacionUsuario.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <?php
            include '../../Librerias/extensiones.php';
        ?>
        <link href="../css/estiloDisposal.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/Material.js" type="text/javascript"></script>
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
                    <form name="frmDevolucion" id="frmDevolucion">
                        <input type="hidden" name="accion" id="accion">
                        <h2>Entrega Material(es)</h2>
                        <div class="container" id="div1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="COD_BARRAS">Codigo De Barras</label>
                                        <br>
                                        <input id="txtCodigoBarra2" name="txtCodigoBarra2" type="number" required="" placeholder="Codigo de Barras" onkeypress="return numeros(event)"/>                                    
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
                                                <input type="text" name="txtCaracte" id="txtCaracteristicas" disabled="disabled">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                         <div class="form-group">
                            <label for="OBSERVACION">Observaciones de entrega</label>
                            <textarea id="txtDescripcionEntrega" name="txtDescripcionEntrega" type="text" required="" class="form-control" placeholder="Observaciones De Prestamo"></textarea>
                        </div>
                        <div class="form-group">
                            <center><input value="Retornar" id="retornar" name="retornar" type="submit" class="btn"/></center>                                    
                        
                        </div>
                    </form>
                    <br>
                    <div id='mensaje' style="text-align: center"></div><br>
                    <br>
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

