<HTML>
<HEAD> <TITLE> Ip </TITLE>
</HEAD>
<BODY>

	<h1 align="center"> ALTA DEPARTAMENTOS </h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

Departamento:
<input type='text' name='departamento' value='' size=15><br>

<br><br>
<input type="submit" name="button" value="ALTA">
<br><br>

</form>

<?php 


include ("funcionesBBDD.php");

if (isset($_POST["button"])) {

	$conexion = crearconexion();
	$Nombredepartamento = $_POST['departamento'];	
	$nombreDepartamento = limpiar_campo($Nombredepartamento);
	altaDepartamento($nombreDepartamento, $conexion);

}


 ?>

</BODY>
</HTML>