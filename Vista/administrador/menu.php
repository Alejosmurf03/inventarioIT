
<?php
include '../../Librerias/extensiones.php';
?>
<header>
	<div class="contenedorNavAprendiz"> <!-- este div se utiliza para mantener un width diferente -->
            <a class="logo" href="Inicio.php">
                    HALLIBURTON
            </a>
            <div id="menu">
                <nav>
                    <ul>
                        <li class="itemResponsive"><a href=""><?php echo $_SESSION["HUsuario"];?></a></li>
                        <li><a href="Inicio.php">Inicio</a></li>
                        <li class="submenu">
                            <a href="#">Material<span class="icon-chevron-right"></span></a>
                           
                            <ul>
                                <li><a href="agregarMaterial.php">Agregar Material</a></li>
                                <li><a href="Envio.php">Enviar o Recibir</a></li>
                                <li><a href="Entregas.php">Entregar</a></li>
                                <li><a href="Prestamo.php">Prestar o retonar</a></li>
                                <li><a href="Mantenimiento.php">Mantenimiento</a></li>
                                <li><a href="Disposal.php">Disposal</a></li>
                            </ul>
                        </li>
                        
                        <li class="submenu"><a href="#">Inventario<span class="icon-chevron-right"></span></a>
                            <ul>
                                <li><a href="Inventario.php">Todos</a></li>                                                       
                                <li><a href="agregarTipoM.php">Agregar Tipos Material</a></li>
                                <li><a href="agregarBase.php">Agregar Base</a></li>
                            </ul>
                        </li>
                        <li><a href="Acta.php">Acta</a></li>
                        <li class="submenu"><a href="#">Usuarios<span class="icon-chevron-right"></span></a>
                            <ul>
                                <li><a href="agregarUsuario.php">Agregar</a></li>
                                <li><a href="ListaUsuarios.php">Lista</a></li>  
                            </ul>
                        </li>
                        <li class="itemResponsive"><a href="https://halworld.corp.halliburton.com/en/default.html#">HALLWORLD</a></li>
                        <li class="itemResponsive"><a href="../../Modelo/cerrar_sesion.php">Cerrar Sesion</a></li>
                        <div id="ContePanelUsuarioDesp">
                            <div id="btnActivarPanel">
                                <label><?php echo $_SESSION["HUsuario"];?></label>
                            </div>
                            <div class="panelUsuario">
                                <div id="contenedorOpcionesPanel">
                                        <br>
                                        <a href="Perfil.php"><div class="btnOpcion">Perfil</div></a>
                                        <a href="../../Modelo/cerrar_sesion.php"><div class="btnOpcion">Cerrar Sesion</div></a>
                                        <br>
                                </div>
                            </div>
                        </div>
                    </ul>
                </nav>
            </div>
            <div class="menu-toggle">
            <div class="toggle">
                    <span></span>
                    <span></span>
                    <span></span>
            </div>
	</div>
	</div>
</header>