<?php 
session_start();
error_reporting(0);
extract($_SESSION);
$id = $_SESSION['nombreRol'];

if ($id == "Administrador") {
	
}else{
header("location: ../../index.php");
}

?>