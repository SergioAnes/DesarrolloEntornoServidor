<?php
session_start();
?>
<html>
<head>
<title>Pagina Login</title>
</head>
<body>
<?php

 include ("funcionesWeb.php"); //Se tiene que poner antes del html desplegable porque si no sale vacío. 
 $conexion = crearConexionPDO();
 //$esDNI=comprobarDNIRegistrado();


if(isset($_SESSION['dni'])) {
echo "<p> Has iniciado sesion: " . $_SESSION['dni'] . "";
echo "<p><a href='comlogincli3.php'> Cerrar Sesion </a></p>";
}
else {
?>
<form action="comlogincli2.php" method="POST">
<h1> Login </h1>
<p>dni:<input type="text" placeholder="Introduce nif" name="dni" required/></p><br />
<p>Contraseña:<input type="text" placeholder="Introduce contraseña" name="contra" required/></p><br />


<input type="submit" value="Login" />
</form>
<?php
	}
?>
<a href="comlogincli2.php"> Ir a pagina 2</a>
</body>
</html>