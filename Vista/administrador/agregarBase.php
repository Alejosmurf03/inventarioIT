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
         
        <title>Agregar Bases</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">
                <div class="col-md-1"></div>                               
                <div class="col-md-10" id="margen">
                    <h2>Agregar Bases</h2>
                    <br>
                    <form name="frmBase" id="frmBase" action="javascript: AgregarBase();">
                        <input type="hidden" name="accion" id="accion">
                        <div class="form-group">
                            <label for="Base">Ingrese nombre base</label>
                            <input id="txtBase" name="txtBase" type="text" required="" class="form-control" onkeypress="return soloLetras(event)"/>
                        </div>                        
                        
                        <div class="form-group" id="btn1">
                            <center><input value="AÑADIR" id="AgregarBase" name="AgregarBase" type="submit" class="btn btn-outline-dark"/></center>
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