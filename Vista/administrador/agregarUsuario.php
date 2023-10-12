
<?php
include 'ValidacionUsuario.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <?php
            include '../../Librerias/extensiones.php';
        ?>
        <link href="../css/estiloAgregarUsuario.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../../js/Usuario.js"></script>
         
        <title>Agregar Usuario</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">
                <div class="col-md-12" id="margen">
                    <form name="frmUsuario" id="frmUsuario" action="javascript: Agregar();">
                    <input type="hidden" name="accion" id="accion">
                        <h2>Agregar Usuario</h2>
                        <div class="form-group">
                            <label for="USER_ID">Usuario ID</label>
                            <input id="txtH" name="txtH" type="text" required="" class="form-control" placeholder="Example: H123456"/>
                            <div id="lblH"></div>
                        </div>
                        <div class="form-group">
                            <label for="PASS">Asignar Password</label>
                            <input id="txtPassword" name="txtPassword" type="password" required="" class="form-control" placeholder="Asignar Password"/>
                        </div>
                        <div class="form-group">
                            <label for="NOMBRE">Nombre Completo</label>
                            <input id="txtNombre" name="txtNombre" type="text" required="" class="form-control" placeholder="Nombre Completo" onkeypress="return soloLetras(event)"/>
                        </div>
                        <div class="form-group">
                            <label for="ROL">Rol Del Usuario</label>
                            <select id="cbRol" name="cbRol" class="form-control" required="">                                
                             
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="BASE">Base donde esta ubicado</label>
                            <select id="cbBases" name="cbBases" class="form-control" required="">                                
                                
                            </select>
                        </div>
                        <div class="form-group" id="btn1">
                            <center><input value="AGREGAR USUARIO" id="Agregar" name="Agregar" type="submit" class="btn btn-outline-dark"/></center>
                        </div>
                        <br>
                        <div id='mensaje' style="text-align: center"></div><br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
		listarBase();
                listarRol();
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
