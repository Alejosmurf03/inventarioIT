<?php
include 'ValidacionUsuario.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <?php
            include '../../Librerias/extensiones.php';
        ?>
        <title>Envios</title>
        <link href="../css/estiloEnvios.css" rel="stylesheet" type="text/css"/>
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

                            <center><a href="Envio.php" id="a1"><button type="button" class="btn btn-block" id="btnrec" name="bteenv">ENVIAR</button></a></center>
                        </div>
                        <div class="col-lg-6">

                            <center><a href="Recibir.php" id="a1"><button type="button" class="btn btn-block" id="btnrec" name="btnrec">RECIBIR</button></a></center>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="container" id="con1">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" id="margen">
                    <h2>Datos De Envio</h2>
                    <div class="container">
                        <form name="frmEnvio" id="frmEnvio" action="javascript: AgregarEnvio();">
                            <input type="hidden" name="accion" id="accion">
                            <input type="hidden" name="idTemp" id="idTemp">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="NUM_GUIA">Número De Guía</label>
                                    <input id="txtNumeroGuia" name="txtNumeroGuia" type="number" required="" class="form-control" placeholder="Numero De Guia" onkeypress="return numeros(event)"/>
                                </div>
                                <div class="form-group">
                                    <label for="BASE">Base A Enviar</label>
                                    <select id="cbBases" name="cbBases" class="form-control" required="">                                
                                     
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="Husuario">H del usuario envia</label>
                                    <input id="HUEnvia" name="HUEnvia" type="text" required="" class="form-control" placeholder="Usuario que se envia"/>
                                </div>                              
                                <div class="form-group">
                                    <label for="OBSERVACION">Observaciones De Envio</label>
                                    <textarea id="txtObservacion" name="txtObservacion" type="text" required="" class="form-control" placeholder="Observaciones De Envio"></textarea>

                                </div>
                                <h2>Material(es)</h2>
                                <div>
                                    <div class="form-group">
                                        <label for="COD_BARRAS">Codigo De Barras</label>
                                        
                                        <input id="txtCodigoBarraEnvio" name="txtCodigoBarraEnvio" type="number" class="form-control" placeholder="Codigo De Barras" onkeypress="return numeros(event)"/>
                                    </div>
                                </div>
                                <div class="container" id="div">
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label for="SERIAL">Serial</label>
                                            <input id="txtSerial" name="txtSerial" type="text" required="" class="form-control" disabled="" placeholder="Serial"/>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="Tipo">Tipo</label>
                                            <input id="txtTipo" name="txtTipo" type="text" required="" class="form-control" disabled="" placeholder="Tipo"/>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="GRFS">gRFS</label>
                                            <input id="txtGRFS" name="txtGRFS" type="text" class="form-control" placeholder="gRFS"/>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Confirmar</label><br>       
                                            <button id="Confirmar_material" name="Confirmar_material" class="btn btn-danger" type="button" onclick="EnvioTemporal();listarMaterialesEnvio()">+</button>
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
                                    <center><input value="Crear Envio" id="AgregarEnvio" name="AgregarEnvio" type="submit" class="btn btn-outline-dark"/></center>
                                </div>
                                <br>
                                <div id='mensaje' style="text-align: center"></div><br>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <script type="text/javascript">
		listarBase();
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
