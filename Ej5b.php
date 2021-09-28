<!DOCTYPE html>
<html>
<head>
	<title> Ejercicio ej4b Sergio Anes </title>
</head>
<body>

	<?php 

	//tabla de multiplicar de un numero cualquiera. 

	echo "<br>";

	$numero=8;

	function tablaMultiplicar ($numero){

		 echo "<table border='1'>";

		for ($i=1; $i<=10; $i++){

			echo "<tr>" . "<td>" . "$numero" . "  X" . "  $i " . "</td>" . "<td>" .  $numero*$i . "</tr>"; //la multiplicación, sin comillas. 
		}

		  echo "</table>";
	}//fin de la tabla de multiplicar. 
		
	tablaMultiplicar($numero);

 ?>


</body>
</html>
