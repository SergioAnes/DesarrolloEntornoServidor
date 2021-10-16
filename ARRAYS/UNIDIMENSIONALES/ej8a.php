<!DOCTYPE html>
<html>
<head>
	<title> Ej8a</title>
</head>
<body>


<?php 


	//Programa ej8a.php crear un array asociativo con los nombres de 5 alumnos y la nota de cada uno de ellos en Bases Datos. Se pide:

	$alumnos=array("Pepe" => 8, "Eduardo" => 5, "Hans" => 9, "Sara" => 2, "Vero" => 4);


	print_r($alumnos);

	echo "<br>";



//a. Mostrar el alumno con mayor nota.
//b. Mostrar el alumno con menor nota.
//c. Media notas obtenidas por los alumnos. //necesito recoger los valores cada vez que se pase por el bucle y dividirlo entre el numero de veces que pasa. 

	$mayor=$alumnos["Pepe"];
	$menor=$alumnos["Pepe"];
	$suma=0;


	$i=0;
	foreach ($alumnos as $indice=>$valores) {

		$suma+=$valores; 

		if ($valores > $mayor) {
			$mayor = $valores;
			$nombreMayor=$indice;

		} else if ($valores < $menor) { 

			$menor= $valores;
			$nombreMenor=$indice;
		}

	}

	$resultado = $suma/count($alumnos);

	echo "El alumno con mayor nota es: $mayor y su nombre es: $nombreMayor <br>";
	echo "El alumno con menor nota es: $menor y su nombre es: $nombreMenor <br>";
	echo "La media de las notas es: $resultado <br>";






 ?>



</body>
</html>