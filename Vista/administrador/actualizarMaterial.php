
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
        <script type="text/javascript" src="../../js/Material.js"></script>
        
        <title>Actualizar Material</title>
       
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">
                <div class="col-md-12" id="margen">
                    <form name="frmUsuario" id="frmUsuario" action="">
                        <input type="hidden" name="accion" id="accion">
                        <h2>Actualizar Material</h2>
                        <div class="caja">
                            <div class="form-group">
                                <label for="Codigo">Codigo de Barras</label>
                                <br>      
                                <input type="text" name="txtCodigo" id="txtCodigo" required="" type="number" onkeypress="return numeros(event)">

                            </div>
                        </div>
                        <div class="caja">
                            <div class="form-group">
                                <label for="TIPO">Tipo de Elemento</label>
                                <input id="txtTipo" name="txtTipo" type="text" required=""/>
                                <input type="hidden" name="txtIdTipo" id="txtIdTipo">

                            </div>
                        </div>
                        <div class="caja">
                            <div class="form-group">
                                <label for="COSTO">Costo Material</label>
                                <br>      
                                <input type="text" name="txtCosto" id="txtCosto" required="" type="number" onkeypress="return numeros(event)">

                            </div>
                        </div>
                        <div class="caja">
                            <div class="form-group">
                                <label for="CARACTERISTICAS">Caracteristicas</label>
                                <br>      
                                <textarea id="txtCaract" name="txtCaract" type="text"></textarea>
                       
                            </div>
                        </div>


    
                        <div class="form-group" id="btn1">
                            <center> <button id="Actualizar" name="Actualizar" class="btn btn-outline-dark" type="button" onclick="ActualizarMaterial()">Actualizar Material</button></center>                                     
                      
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
            obtenerMaterial();
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
