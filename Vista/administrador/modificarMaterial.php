
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
        <script type="text/javascript" src="../../js/Inventario.js"></script>
        <title>Materiales especificos</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">
                <h2>Escoge el material que quieres editar</h2>
                <div class="table-responsive" id="tabla">
                    <table id="tabla1" name="tabla1" class="table table-striped table-bordered " style="width:100%;">
                    <input type="hidden" name="accion" id="accion">
                        <thead id="thead">
                            <tr>
                                <td>Codigo Barras</td>
                                <td>Tipo Elemento</td>
                                <td>Serial</td>  
                                <td>Costo</td>
                                <td>Caracteristicas</td>
                                <td>Revisar</td>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr id="fila">
                                <td id="codigo"></td>
                                <td id="tipo"></td>
                                <td id="serial"></td>
                                <td id="costo"></td>
                                <td id="caracteris"></td>
                                <td id="revisar" class="ver"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script type="text/javascript">
		   listaEspecifica();
	    </script>
    </body>
</html>

