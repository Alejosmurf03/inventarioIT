
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
        
        <title>Actualizar Usuario</title>
       
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
                        <h2>Actualizar Usuario</h2>
                        <div class="caja">
                            <div class="form-group">
                                <label for="NOMBRE">Nombre</label>
                                <br>      
                                <input type="text" name="txtNombres" id="txtNombres" required="" onkeypress="return soloLetras(event)">

                            </div>
                        </div>
                   
                        <div class="caja">
                           <div class="form-group">
                            <label for="ROL">Cambiar rol</label>
                            <br>
                             <select id="cbRol" name="cbRol" required="">                                
                               
                             </select>
                           </div>
                        </div>
                        
                         <div class="caja">
                            <div class="form-group">
                                <label for="ROL">Cambiar base</label>
                                    <br>
                                <select id="cbBases" name="cbBases" required="">                                
                              
                                </select>
                            </div>
                         </div>
                        <div class="form-group" id="btn1">
                            <center> <button id="Actualizar" name="Actualizar" class="btn btn-outline-dark" type="button" onclick="ActualizarUsuario()">Actualizar Usuario</button></center>                                     
                        </div>
                        <br>
                        <div id='mensaje' style="text-align: center"></div><br>
                        <div id='txtIdUsuario' style="text-align: center"></div><br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
               listarBase();
              listarRol();
              $("#cbRol").change(setTimeout('obtenerUsuario()'));
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
