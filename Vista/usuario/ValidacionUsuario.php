<?php 
session_start();
error_reporting(0);
extract($_SESSION);
$id = $_SESSION['nombreRol'];

if ($id == "Usuario") {
	
}else{
header("location: ../../index.php");
}

?>