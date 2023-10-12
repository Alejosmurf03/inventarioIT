<?php
include 'ValidacionUsuario.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <?php
            include '../../Librerias/extensiones.php';
        ?>
        <link href="../css/estiloInventario.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../../js/Usuario.js"></script>
        <title>Lista de Usuarios</title>
        
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">
                <h2>Usuarios Activos</h2>
                <div class="table-responsive" id="tabla">
                    <table id="tabla1" name="tabla1" class="table table-striped table-bordered " style="width:100%;">
                    <input type="hidden" name="accion" id="accion">
                        <thead id="thead">
                            <tr>
                                <td>ID USuario</td>
                                <td>Nombre</td>
                                <td>Rol</td>
                                <td>Base</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr id="fila">
                                <td id="hUsuarios"></td>
                                <td id="nombreUsuario"></td>
                                <td id="rolUsuario"></td>
                                <td id="baseUsuario"></td>
                                <td id="botones"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script type="text/javascript">
		    listar();
	    </script>
    </body>
    
    </html>

