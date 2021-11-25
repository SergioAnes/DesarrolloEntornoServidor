<HTML>
<HEAD> <TITLE> Probando BBDD </TITLE>
</HEAD>
<BODY>

	<h1 align="center"> ALTA EMPLEADOS </h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

Nombre:
<input type='text' name='nombre' value='' size=15><br>
dni:
<input type='text' name='dni' value='' size=15><br>
fecha de nacimiento:
<input type='text' name='fecha' value='' size=15><br>
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
	$nombreEmpleado = $_POST['nombre'];
	$dniEmpleado = $_POST['dni'];
	$fechaNacimiento = $_POST['fecha'];
	$Nombredepartamento = $_POST['departamento'];	

	$nombreEmpleado = limpiar_campo($nombreEmpleado);
	$dniEmpleado = limpiar_campo($dniEmpleado);
	$fechaNacimiento = limpiar_campo($fechaNacimiento);
	$Nombredepartamento = limpiar_campo($Nombredepartamento);
	
	altaEmpleado($conexion, $nombreEmpleado, $dniEmpleado, $fechaNacimiento, $Nombredepartamento);

}


 ?>

</BODY>
</HTML>