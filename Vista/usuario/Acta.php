<?php
include 'ValidacionUsuario.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/Acta.css" rel="stylesheet" type="text/css"/>
        <link href="../../librerias/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!--<script src="../librerias/bootstrap-4.3.1-dist/js/bootstrap.min.js" type="text/javascript"></script>-->
        <!--<script src="../librerias/bootstrap-4.3.1-dist/js/jquery.js" type="text/javascript"></script>-->
        <script src="../../js/jquery/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../../js/Material.js"></script>
        <title>Acta Entregar</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="container" id="con1">
            <div class="row">
                <div class="col-md-12" id="margen">
                    <form name="" id="" action="">
                        <h2>HALLIBURTON</h2>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="USER">Usuario:</label>
                                        <input id="txtH" name="txtH" type="text" required="" class="form-control" placeholder="Usuario"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="EXTENCION">Extención:</label>
                                        <input id="txtExtencion" name="txtExtencion" type="text" required="" class="form-control" placeholder="Extención"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="DEPARTAMENTO">Departamento:</label>
                                        <input id="txtDepartamento" name="txtDepartamento" type="text" required="" class="form-control" placeholder="Departamento"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="CODBARRAS">Codigo De Barras:</label>
                                        <input id="txtCodigoBarra" name="txtCodigoBarra" type="text" required="" class="form-control" placeholder="Codigo De Barras"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2></h2>
                        <div class="form-inline">
                            <h6>En conformidad he recibido el siguiente equipo:</h6>
                        </div>
                        <h5>HARDWARE</h5>
                        <div class="form-group">
                            <h6>Tipo De Computador</h6>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Portatil: <input id="txtPortatil" name="txtPortatil" type="checkbox" value="Portatil"/></label>
                                </div>
                                <div class="col-md-4">
                                    <label>Desktop: <input id="txtDesktop" name="txtDesktop" type="checkbox" value="Desktop"/></label>
                                </div>
                                <div class="col-md-4">
                                    <label>S/N:</label>
                                    <input id="txtSN" name="txtSN" type="text" placeholder="S/N"  />
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <label><h6>Especificaciones: </h6></label>
                                </div>
                                <div class="col-md-5">
                                    <label>Marca/Modelo: </label>
                                    <input id="txtMarcaymodelo" name="txtMarcaymodelo" type="text" placeholder="Marca/Modelo" class="form-control"/>    
                                    <label>Memoria Ram: </label>
                                    <input id="txtMemoriaram" name="txtMemoriaram" type="text" placeholder="Memoria Ram" class="form-control"/>
                                </div>
                                <div class="col-md-5">
                                    <label>Procesador: </label>
                                    <input id="txtProcesador" name="txtProcesador" type="text" placeholder="Procesador" class="form-control"/>
                                    <label>D.D.: </label>
                                    <input id="txtd-d" name="txtd-d" type="text" placeholder="D.D." class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <h2></h2>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <label><h6>Monitor: </h6></label>
                                </div>
                                <div class="col-md-5">
                                    <label>Marca/Modelo: </label>
                                    <input id="txtMarcaymodelo" name="txtMarcaymodelo" type="text" placeholder="Marca/Modelo" class="form-control"/>
                                </div>
                                <div class="col-md-5">
                                    <label>S/N:</label>
                                    <input id="txtSnM" name="txtSnM" type="text" placeholder="S/N" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><h6>Version COE / S.O : </h6></label>
                            <input id="txtVersion" name="txtVersion" type="text" placeholder="Version COE / S.O" class="form-control"/>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 form-check-inline" style="display: flex; flex-direction: column;">
                                    <label>Teclado : <input id="txtTeclado" name="txtTeclado" type="checkbox"  class="form-control" /></label>
                                    <label>Cables De Poder : <input id="txtCablepoder" name="txtCablepoder" type="checkbox" class="form-control" /></label>
                                    <label>Cable Telefonico : <input id="txtCabletelefonico" name="txtCabletelefonico" type="checkbox" class="form-control" /></label>
                                </div>
                                <div class="col-md-4 form-check-inline" style="display: flex; flex-direction: column;">
                                    <label>Mouse: <input id="txtMouse" name="txtMouse" type="checkbox" class="form-control" /></label>
                                    <label>Unidad De Diskette: <input id="txtUnidaddiskette" name="txtUnidaddiskette" type="checkbox" class="form-control" /></label>
                                    <label>Unidad De CD: <input id="txtUnidadcd" name="txtUnidadcd" type="checkbox" class="form-control" /></label>
                                </div>
                                <div class="col-md-3 form-check-inline" style="display: flex; flex-direction: column;">
                                    <label>Memory Key : <input id="txtMemoryKey" name="txtMemoryKey" type="checkbox" class="form-control"/></label>                                    
                                    <label>Maletin : <input id="txtMaletin" name="txtMaletin" type="checkbox" class="form-control"/></label>
                                    <label>Modem : <input id="txtModem" name="txtModem" type="checkbox" class="form-control"/></label>
                                </div>
                            </div>
                        </div>
                        <h2></h2>
                        <div class="form-group">
                            <label for="IMPRESORAS"><h6>Impresoras Instaladas:</h6></label>
                            <p>(Incluir Marca, Referencia y S/N Impresora Local)</p>
                            <textarea id="txtImpresoras" name="txtImpresoras" type="text" required="" class="form-control" placeholder="Impresoras Insataladas"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="DISPOSITIVOSADI"><h6>Dispositivos Adicionales:</h6></label>
                            <p>(Incluir Marca, Referencia y S/N )</p>
                            <textarea id="txtDispositivos" name="txtDispositivos" type="text" required="" class="form-control" placeholder="Dispositivos Adicionales"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="DISPOSITIVOSADI"><h6>Dispositivos Adicionales:</h6></label>
                            <div class="form-group">
                                <label>CPU Marca/Mod/SN:</label>
                                <input id="txt" name="" type="text" placeholder="CPU Marca/Mod/SN" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Monitor Marca/Mod/SN:</label>
                                <input id="txt" name="txt" type="text" placeholder="Monitor Marca/Mod/SN" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Celular:</label>
                                <input id="txtCelular" name="txtCelular" type="text" placeholder="Celular" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>M.Ram:</label>
                                <input id="txtMRam" name="txtMRam" type="text" placeholder="M.Ram" class="form-control" />
                            </div>

                        </div>
                        <h2></h2>
                        <div class="form-group">
                            <label for="OBSERVACIONES"><h6>Observasiones:</h6></label>
                            <textarea id="txtObservaciones" name="txtObservaciones" type="text" required="" class="form-control" placeholder="Observaciones"></textarea>
                        </div>
                        <h2></h2>
                        <p>Este equipo es de propiedad de Information Technology - Colombia y no puede ser transferido a otro pais.</p>
                        <p>en caso de transferencia del usuario, este debe entregarla al departemento de IT con todos los accesorios asignados.</p>
                        <div id="margen">
                            <p>Conscientes de la importancia que se le debe prestar a las herramientas de trabajo y considerando el Numeral 3° del Articulo 46 del Reglamento de Trabajo,que dice:
                                "corservar y restituir un buen estado, salvo deterioro natural, los intrumentos y utiles que se le hayan facilitado";todos los empleados, debemos seguir las siguientes normas relacionadas
                                con el cuidado de los equipos suministrados por la compañia:</p>
                            <p>1. Mantener los laptop en sitios seguros cuando son empleados fuera de la Bases y Oficinas.</p>
                            <p>2. Llevar a la mano los laptop durante vuelos en aeronaves.</p>
                            <p>3. No llevar consigo maletines con laptop durante desplazamientos a pie por la calle. El transporte de laptops debe hacerse en vehiculos confiables o en los taxis recomendados por la compañia, directamente hasta un sitio seguro.</p>
                            <p>4.      Registrar estos elementos al momento de check-in y check-out en los hoteles.</p>
                            <p>5.      Extremar las precauciones con estos elementos en los Aeropuertos.</p>
                            <p>6.      Pasar el laptop por la maquina de rayos-X solo hasta cuando se asegure que no hay extraños al otro lado de la banda transportadora.</p>
                            <p>7.      Asegurar bajo llave los computadores al retirarse de la oficina.</p>
                            <p>8.      No descuidar el celular en lugares públicos. El robo generalmente se presenta por desatención del usuario.</p>
                            <p>9.      Dentro de los vehículos, ubicar el celular y laptop en sitios donde los delincuentes no tengan fácil acceso.</p>
                            <p>10.   Los celulares y laptops son extremadamente sensibles a golpes. Deben tratarse con el debido cuidado que requieren estos equipos electrónicos.</p>
                            <p>En caso de perdida el empleado deberá colocar el denuncio respectivo ante la autoridad competente en un lapso no mayor a 48 horas e informar al Dpto. de Seguridad para el inicio de la investigación correspondiente. Si como resultado de la investigación se determina que hubo descuido o negligencia por parte del empleado, este deberá restituir el equipo o su valor comercial.</p>
                            <p>Camilo Ceron              Dpto. de SEGURIDAD</p>
                            <p>Juan Carlos Escobar  Dpto. de IT  </p>
                            <p>Gustavo Grisales        Dpto. de RECURSOS HUMANOS</p>
                        </div><br>
                        <center><h6>*** FAVOR LEER AL RESPALDO LA POLITICA DE USO DE COMPUTADORAS Y SOFTWARE ***</h6></center>
                        <br>
                        <div id="margen">
                            <center><h6>POLITICA DE USO DE EQUIPOS</h6></center>
                            <p>Estos equipos estan destinados para propósitos comerciales de Halliburton y sus compañias afiliadas. No se garantiza el derecho de privacidad individual, y la compañía se reserva el derecho de monitorear y controlar el uso de estos equipos. Estos equipos son privados, y se limita el acceso a aquellas personas autorizadas por el sistema de seguridad de la compañia.</p>
                            <center><h6>POLITICA DE USO DE SOFTWARE: CORREO ELECTRONICO, INTERNET Y LICENCIAMIENTO</h6></center>
                            <p>La adquisición, instalación, uso, y distribución de todo software en los equipos de la Compañía, debe ser autorizado por el Gerente del departamento de Tecnología de Información (IT) o su delegado. La adquisición, uso, y distribución de software, gratuito o no,  obtenido de una fuente externa vía World Wide Web, correo electrónico u otros medios también debe ser  previamente autorizado por el Gerente del departamento de Tecnología de Información (IT) o su delegado.</p>
                            <p>La instalación, el uso o la distribución de  software en los equipos de la Compañía, que no este debidamente licenciado no es permitida. Es una violación a la Política de Halliburton el uso de las computadoras, servidores y otro recurso de computación de la Compañía para descargar y/o almacenar software o archivos registrados sin el permiso expreso o la respectiva licencia del autor. Los empleados no pueden almacenar ni distribuir archivos con contenido inapropiado, archivos de música, archivos de video u otro tipo de archivos que viole los derechos de autor o que no estén debidamente licenciados.</p>
                            <p>El departamento de Tecnología de Información (IT) puede monitorear en cualquier momento el equipo para detectar violaciones a esta norma, siendo responsabilidad de cada usuario el software o los archivos contenidos en el equipo asignado o en los dispositivos anexos. Por esta razón, la Compañía se reserva el derecho monitorear y controlar el uso de los recursos de computación, red y datos de la Empresa; esto incluye, sin limitación y sin previo aviso, el derecho para acceder y revelar, una vez se haya realizado la investigación correspondiente, el contenido de los recursos de computación, red y datos y/o mantener los recursos de computación, red y datos de la Compañía.</p>
                        </div>
                        <h2></h2>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label><h6>Firma Representante IT</h6></label>
                                    <input id="txtFirma" name="txtFirma" type="text" placeholder="Firma Representante IT" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label><h6>Firma Usuario</h6></label>
                                    <input id="txtFirmausuario" name="txtFirmausuario" type="text" placeholder="Firma Usuario" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
