<?php
include 'ValidacionUsuario.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <?php
            include '../../Librerias/extensiones.php';
        ?>
        <title>Recibir Envios</title>
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
                    <h2>Recibir Envio</h2>
                    <div class="container">
                        <form method="" action="">
                            <input type="hidden" name="accion" id="accion">
                            <input type="hidden" name="idBase" id="idBase" value="<?php echo $_SESSION['IDbase'];?>">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="NUM_GUIA">Numero De Guia</label>
                                    <input id="txtNumeroGuiaApr" name="txtNumeroGuiaApr" type="number" required="" class="form-control" placeholder="Numero De Guia" onkeypress="return numeros(event)"/>
                                </div>
                                <div class="form-group">
                                    <label for="FEC_ENVIO">Fecha De Envio</label>
                                    <input id="txtFechaEnvio" name="txtFechaEnvio" type="text" class="form-control" disabled="disabled"/>
                                </div>
                                <div class="form-group">
                                    <label for="BASE">Base A Ingresar</label>
                                    <input id="txtBase" name="txtBase" type="text" class="form-control" disabled="disabled"/>
                                </div>
                                <div class="form-group">
                                    <label for="BASE">Observacion de envio</label>
                                    <textarea id="txtObservacionEnvio" name="txtObservacionEnvio" type="text" class="form-control" disabled="disabled"></textarea>
                                </div>
                                <h2>Materiales</h2>
                                <div class="container">
                                <div class="row">
                                    <div class="table-responsive" id="tabla">
                                        <table id="tabla1" name="tabla1" class="table table-striped table-bordered " style="width:100%;">
                                       
                                            <thead id="thead">
                                                <tr>
                                                    <td>Codigo de Barras</td>
                                                    <td>Serial equipo</td>                             
                                                    <td>Tipo Elemento</td>
                                                    <td>Caracteristicas</td>
                                                    <td>Numero gRFS</td>
                                                    <td>Aprobacion</td>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody">
                                                <tr id="fila">
                                                    <td id="codigo"></td>
                                                    <td id="serial"></td>
                                                    <td id="tipo"></td>
                                                    <td id="caracteristica"></td>
                                                    <td id="grfs"></td>
                                                    <td id="aprobacion"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group" id="btn1">
                                    <center><button id="Confirmar_material" name="Confirmar_material" class="btn btn-danger" type="button" onclick="completarRecibido()">completado</button></center>                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-1"></div>
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
