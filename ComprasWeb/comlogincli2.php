<?php
session_start();
?>
<html>
<head>
<title>Pagina 2</title>
</head>
<body>
<?php

 include ("funcionesWeb.php"); //Se tiene que poner antes del html desplegable porque si no sale vacío. 
 $conexion = crearConexionPDO();

if(isset($_POST['dni']) && ($_POST['contra'])){ //La primera vez que pongo un nombre luego se va aquí, porque el campo $_POST['nombre'] se ha rellenado. 
	$dni=limpiar_campo($_POST['dni']);
	$contra=limpiar_campo($_POST['contra']);
	$esdni= comprobarDNIRegistrado2($dni,$conexion); //verdadero o falso
	$eslaContraseña = comprobarContraseñaDNI($dni,$conexion); 

	if ($esdni && ($eslaContraseña==$contra)) {

		$_SESSION['dni'] = $_POST['dni']; //Y se le da ese valor a la sesión. 
		echo "Bienvenido! Has iniciado sesion: ". $_POST['dni'];
		echo "<p><a href='comconscom.php'> Comprobar stock </a></p>";

	} 

	} else {

		if (isset($_SESSION['dni'])) { //Si le doy a volver a la página del login, va al primer if de la pagina 1. Y desde ahí se puede volver a este if dándole a "ir a página dos". 
			echo "Has iniciado Sesion: ".$_SESSION['dni'];
			echo "<p><a href='comconscom.php'> Comprobar stock </a></p>";
		}

		else{
		echo "Acceso Restringido debes hacer Login con tu usuario y tu contraseña adecuados";
		}
	 } 	
?>
<br /><a href="comlogincli.php">Volver a pagina Login</a>
</body>
</html>