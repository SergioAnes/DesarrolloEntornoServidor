
<!DOCTYPE html>
<html>
<head>
	<title> Ejercicio ej4b Sergio Anes </title>
</head>
<body>

	<?php 

	//tabla de multiplicar de un numero cualquiera. 

	$numero=8;

	function tablaMultiplicar ($numero){

		for ($i=0; $i<=10; $i++){

			echo "$numero" . "  X" . "  $i ". " = " . $numero*$i . "<br>"; //la multiplicación, sin comillas. 

		}

	}//fin de la tabla de multiplicar. 

	tablaMultiplicar($numero);

 ?>

</body>
</html>
