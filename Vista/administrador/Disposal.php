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
        <script type="text/javascript" src="../../js/Material.js"></script>
        <title>Diposal</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">
                <div class="col-md-12" id="margen">
                    <h2>Añadir a Disposal</h2>
                    <form id="frmDisposal" name="frmDisposal" action="javascript: AgregarDisposal();">
                    <input type="hidden" name="accion" id="accion">
                        <div class="cajaPrin">
                           <div class="form-group">
                                   <label for="COD_BARRA">Ingresar codigo de barras</label>
                                   <br>
                                   <input id="txtCodigoBarrasMa" name="txtCodigoBarrasMa" type="number" required="" placeholder="Codigo de Barras" onkeypress="return numeros(event)"/>
                           </div>
                        </div>
                        <div class="caja">
                            <div class="form-group">

                                    <label for="BASE">Base</label>
                                    <br>
                                    <div id="txtBase">
                                        <input type="text" name="txtBases" id="txtBases" disabled="disabled">
                                    </div>

                            </div>
                       </div>
                       <div class="caja">
                            <div class="form-group">

                                <label for="SERIAL">Serial</label>
                                <br>
                                <div id="txtSerial">
                                    <input type="text" name="txtSeriales" id="txtSeriales" disabled="disabled">
                                </div>

                            </div>
                        </div>
                        <div class="caja">
                            <div class="form-group">

                                    <label for="TIPO">Tipo</label>
                                    <div id="txtTipo">
                                        <input type="text" name="txtTipos" id="txtTipos" disabled="disabled">
                                    </div>
                            </div>
                        </div>
                        <div class="caja">
                          <div class="form-group">
                           
                                <label for="COSTO">Costo gRFS</label>
                                <div id="txtCosto">
                                    <input type="text" name="txtCostos" id="txtCostos" disabled="disabled">
                                </div>
                          </div>
                        </div>
                        <div class="caja">
                            <div class="form-group">
                                    <label for="FECHA">Fecha De Ingreso</label>
                                    <div id="txtFecha">
                                        <input type="text" name="txtFechas" id="txtFechas" disabled="disabled">
                                    </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="OBSERVACION">Observaciones Disposal</label>
                            <textarea id="txtObservacion" name="txtObservacion" type="text" required="" class="form-control" placeholder="Observaciones Disposal"></textarea>
                        </div>
                        <div class="form-group">
                            <center><input value="Añadir A Disposal" id="AgregarDisposal" name="AgregarDisposal" type="submit" class="btn"/></center>
                        </div>
                        <br>
                        <div id='mensaje' style="text-align: center"></div><br>
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
