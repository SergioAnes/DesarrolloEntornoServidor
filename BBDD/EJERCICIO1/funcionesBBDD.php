
<<?php 

function limpiar_campo($campoformulario) {
  $campoformulario = trim($campoformulario); //elimina espacios en blanco por izquierda/derecha
  $campoformulario = stripslashes($campoformulario); //elimina la barra de escape "\", utilizada para escapar caracteres
  $campoformulario = htmlspecialchars($campoformulario);  
 
  return $campoformulario;
   
}


function crearConexion () {
	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname="empleados1n";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	// Check connection
	if (!$conn) {
    die("Ha sucedido un error inexperado en la conexion de la base de datos");
}
	return $conn;

}//fin crear conexion


function altaDepartamento ($Nombredepartamento, $conexion) {

	$insertarDepartamento = "INSERT INTO departamento (nombre_d) VALUES ('$Nombredepartamento')";

	if (mysqli_query($conexion, $insertarDepartamento)) {
    	echo "Se ha creado un nuevo departamento";
	} else {
    	echo "Error en el departamento: ";
	}

	mysqli_close($conexion);



}//fin altaDepartamento





 ?>