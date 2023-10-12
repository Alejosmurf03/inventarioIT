<?php
include 'ValidacionUsuario.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <?php
            include '../../Librerias/extensiones.php';
        ?>
        <link href="../css/estiloMaterial.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../../js/Material.js"></script>
         
        <title>AÑADIR MATERIAL</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">
                <div class="col-md-1"></div>                               
                <div class="col-md-10" id="margen">
                    <h2>Agregar Material</h2>
                    <br>
                    <form name="frmMaterial" id="frmMaterial" action="javascript: Agregar();">
                        <input type="hidden" name="accion" id="accion">
                        <div class="form-group">
                            <label for="TIPO">Ingrese El Tipo</label>
                            <input id="txtTipo" name="txtTipo" type="text" required="" class="form-control" placeholder="Example: Laptop HP EliteBook 840 G5, Laptop HP ZBook 15u G5, Kit de teclado y mouse, Ram, Etc"/>
                            <input type="hidden" name="txtIdTipo" id="txtIdTipo">
                        </div>                        
                        <div class="form-group">
                            <label for="COD_BARRA">Codigo De Barras</label>
                            <input id="txtCodigoBarras" name="txtCodigoBarras" type="number" required="" class="form-control" placeholder="Codigo De Barras" onkeypress="return numeros(event)"/>
                            
                                <div id="lblCodigo"></div>
                         
                        </div>
                        <div class="form-group">
                            <label for="SERIAL">Serial</label>
                            <input id="txtSerial" name="txtSerial" type="text" class="form-control" placeholder="Serial A Añadir"/>
                            <div id="lblSerial"></div>
                        </div>
                        <div class="form-group">
                            <label for="BASE">Base A Ingresar</label>
                            <select id="cbBases" name="cbBases" class="form-control" required="">                                

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="CARACTERISTICAS">Caracteristicas Del Equipo</label>
                            <textarea id="txtCaract" name="txtCaract" type="text" class="form-control" placeholder="Caracteristicas Del Equipo"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="COSTO">Costo gRFS</label>
                            <input id="txtcosto" name="txtcosto" type="number" required="" class="form-control" placeholder="Costo gRFS" onkeypress="return numeros(event)"/>
                        </div>
                        <div class="form-group" id="btn1">
                            <center><input value="AÑADIR" id="Agregar" name="Agregar" type="submit" class="btn btn-outline-dark"/></center>
                        </div>
                        <br>
                        <div id='mensaje' style="text-align: center"></div><br>
                        <br>
                    </form>
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

                        //funcion dejar ingresar solo letras
			function soloLetras(e){
       					key = e.keyCode || e.which;
				       	tecla = String.fromCharCode(key).toLowerCase();
				       	letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
				       	especiales = "8-37-39-46";

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