<!DOCTYPE html>
<html>
<head>
	<title> Ejercicio ej6b Sergio Anes </title>
</head>
<body>

	<?php 
 
	//factorial de un numero 
 
	$numeroFactorial = 5;
  
	function factorial ($numeroFactorial) {

		$resultado=1;

		for ($i=1; $i<=$numeroFactorial; $i++) {

			$resultado *= $i;

		}

			echo $resultado;
	}
  
	echo "El factorial del numero " . $numeroFactorial . " Es: ";
	factorial($numeroFactorial);
 ?>

</body>
</html>
