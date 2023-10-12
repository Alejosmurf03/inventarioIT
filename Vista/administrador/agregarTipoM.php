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

        <title>Agregar tipos</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">
                <div class="col-md-1"></div>                               
                <div class="col-md-10" id="margen">
                    <h2>Agregar Tipos de Material</h2>
                    <br>
                    <form name="frmTipo" id="frmTipo" action="javascript: AgregarMaterial();">
                        <input type="hidden" name="accion" id="accion">
                        <div class="form-group">
                            <label for="TIPO">Ingrese el Tipo</label>
                            <input id="txtTipo" name="txtTipo" type="text" required="" class="form-control" placeholder="Example: Laptop HP EliteBook 840 G5, Laptop HP ZBook 15u G5, Kit de teclado y mouse, Ram, Etc" onkeypress="return soloLetras(event)"/>
                        </div>                        

                        <div class="form-group" id="btn1">
                            <center><input value="AÑADIR" id="AgregarTipo" name="AgregarTipo" type="submit" class="btn btn-outline-dark"/></center>
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