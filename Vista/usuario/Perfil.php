<?php
include 'ValidacionUsuario.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <?php
            include '../../Librerias/extensiones.php';
        ?>
        <link href="../css/Perfil.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../../js/Usuario.js"></script>
        <script type="text/javascript" src="../../js/clave.js"></script>
         <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <title>Perfil Usuario</title>
    </head>
    <body>
        <?php
        include './menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" id="margen">
                    <center><h2>Datos</h2></center>
                    <div class="container" id="con2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="dato">Nombre: </label><br>
                                    <label ><?php echo $_SESSION["nombre"];?></label>
                                </div>
                                <div class="form-group">
                                    <label id="dato">Base: </label><br>
                                    <label><?php echo $_SESSION["base"];?></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="dato">Usuario: </label><br>
                                    <label id="hDelUsuario"><?php echo $_SESSION["HUsuario"];?></label>
                                </div>
                                <div class="form-group">
                                    <label id="dato">Rol: </label><br>
                                    <label><?php echo $_SESSION["nombreRol"];?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2></h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <form name="frmActualizarClave" id="frmActualizarClave">
                                        <center><h4>Actualizar</h4></center>
                                    <div class="form-group">
                                        <label for="CLAVE">Clave Anterior:</label>
                                        <br>
                                        <input id="txtClaveanterio" name="txtClaveanterio" type="password" required="" placeholder="Clave Anterior">
                                         
                                        <br>
                                         <div id="lblClave"></div>
                                         <br>
                                    </div>
                                    <div class="form-group">
                                        <label for="CLAVENUEVA">Clave Nueva:</label>
                                        <br>
                                        <div class="input-group-append">
                                             <input id="txtClavenueva" name="txtClavenueva" type="password" required="" placeholder="Clave Nueva">
                                       
                                            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword3()"> <span class="fa fa-eye-slash icon"></span> </button>
                                        </div>
                                        <br>
                                    </div><br>
                                    <div class="form-group">
                                        <center><input id="ActualizarClave" name="ActualizarClave" type="button" value="Actualizar" class="btn"/></center>
                                    </div>
                                    <br>
                                        <div id='mensaje' style="text-align: center"></div><br>
                                    <br>
                                </form>
  
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>
</html>
