 <?php
require_once('conexion.php');


$variable = $_POST['USER_ID'];
$usuario = strtoupper($variable);
$password = $_POST['PASS'];


try{
	$conexion = new conexion();
	$sqlText = "SELECT usuario.*, rol.*,base.ID_base, base.nombre AS nombreBase, base.ID_base as idBase "
                                . "from usuario inner join rol on rol.ID_rol = usuario.ID_rol "
                                . "inner join base on base.ID_base = usuario.ID_base "
                                . "where usuario.Estado='Activo' and usuario.ID_H= '$usuario' "
                                . "and usuario.pass= '$password'";
	$sql = $conexion->prepare($sqlText);
	$sql->execute();
	$result = $sql->fetch(PDO::FETCH_ASSOC);
}catch(Exception $ex){
	echo "Error";
}

if ($usuario == $result['ID_H'] AND $password == $result['pass']) {  //VALIDA USUARIO Y CONTRASEÑA

   switch ($result['nombre']) {
	case 'Administrador':
		try{
			$conexion = new conexion();
			$sqlText = "SELECT usuario.*, rol.*,base.ID_base, base.nombre AS nombreBase, base.ID_base as idBase "
                                . "from usuario inner join rol on rol.ID_rol = usuario.ID_rol "
                                . "inner join base on base.ID_base = usuario.ID_base "
                                . "where usuario.Estado='Activo' and usuario.ID_H= '$usuario' "
                                . "and usuario.pass= '$password'";
                        $sql = $conexion->prepare($sqlText);
			$sql->execute();
			$result = $sql->fetch(PDO::FETCH_ASSOC);
		}catch(Exception $ex){
			echo "Error";
		}
	
		session_start();
		$_SESSION['idUsuario'] = $result['ID_usuario'];
		$_SESSION['HUsuario'] = $result['ID_H'];
		$_SESSION['password'] = $result['pass'];
		$_SESSION['nombre'] = $result['nombre_compl'];
		$_SESSION['base'] = $result['nombreBase'];
                $_SESSION['IDbase'] = $result['idBase'];
		$_SESSION['nombreRol'] = $result['nombre'];
                $_SESSION['estado'] = $result['Estado'];
		header("location: ../Vista/administrador/Inicio.php");

		break;
	case 'Usuario':
	
	session_start();
		$_SESSION['idUsuario'] = $result['ID_usuario'];
		$_SESSION['HUsuario'] = $result['ID_H'];
		$_SESSION['password'] = $result['pass'];
		$_SESSION['nombre'] = $result['nombre_compl'];
		$_SESSION['base'] = $result['nombreBase'];
                $_SESSION['IDbase'] = $result['idBase'];
		$_SESSION['nombreRol'] = $result['nombre'];
                $_SESSION['estado'] = $result['Estado'];
	header("location: ../Vista/usuario/Inicio.php");
	
		break;
	default : 
		header("location: ../index.php");
		break;
	
	}

	
   }else{

		echo "<script> 

		alert('ERROR, CONTRASEÑA O USUARIO INCORRECTO');
				window.history.back(-1);

		</script>";
	}





?>