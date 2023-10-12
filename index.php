<!DOCTYPE html>


<html>
<head>
	<title>Login Inventario IT</title>
	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="Vista/css/estilo.css">
	<link rel="stylesheet" type="text/css" href="Vista/css/style.css">
        <link rel="stylesheet" href="Vista/css/font-awesome.min.css">
        <link rel="stylesheet" href="Vista/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="js/clave.js"></script>
</head>
<body>
	<div class="conteForm">
		<h2>Iniciar Sesión</h2>
                <form method="post" action="Modelo/validar.php">
		<div class="conteInput">
			
			<span class="icon-user"></span>
                        <input id="USER_ID" name="USER_ID" type="text" name="" required="" placeholder="Usuario H">	

		</div>

		<div class="conteInput">
			
			<span class="icon-lock-closed"></span>
			<input id="PASS" name="PASS" type="password" required="" placeholder="Password">
                        <div class="input-group-append">
                        <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                        </div>

		</div>
		<button class="btn btn-gris" name="submit" id="submit" type="submit">Ingresar</button>
		<br>
		<br>

                </form>
	</div>
</body>
</html>

