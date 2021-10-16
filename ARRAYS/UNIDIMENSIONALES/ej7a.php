
<!DOCTYPE html>
<html>
<head>
	<title>
		EJ7a.php
	</title>
</head>
<body>

<?php 

	//Programa ej7a.php crear un array asociativo con los nombres de 5 alumnos y la edad de cada uno de ellos. Se pide:

	$alumnos = array("Juan" => 17, "Pedro" => 18, "Lucas" => 25, "Mateo"=>27, "Priscila" => 24); //Esto en un array no asociativo seria: $alumnos = array (17,18,25,24);
																								//En ese caso, 17 seria la posicion $alumnos[0]; Ahora es $alumnos[juan];


	echo "Se ha creado el siguiente ARRAY <br>";

	print_r($alumnos);

	echo "<br>";

	echo "Vamos a acceder al valor de Priscila <br>";

	echo $alumnos["Priscila"];

	echo "<br>";
	echo "<br>";

	echo "Punto1: Mostrar el contenido del array usando bucles <br>";

	foreach ($alumnos as $indice => $clave) {

		echo "El alumno $indice tiene la edad $clave <br>";	
	}

		echo "<br>";
	echo "Punto2Y3: Situar el puntero en la segunda posicion y mostrar su valor <br>";
	//VUELVO A DECLRAR EL ARRAY PORQUE CON EL BUCLE ANTERIOR LO HABIA RECORRIDO ENTERO Y NO HABIA NADA
	$alumnos = array("Juan" => 17, "Pedro" => 18, "Lucas" => 25, "Mateo"=>27, "Priscila" => 24);

		$posicion = current($alumnos);
		echo "<br>";
		echo "$posicion";
		echo "<br>";
		$posicion = next($alumnos);
		echo "<br>";
		echo "$posicion";
		echo "<br>";
		echo "<br>";

	echo "Punto4: Situar el puntero en la ultima posicion y muestra su valor <br>";


	$posicion = end($alumnos);
	echo "<br>";
	echo $posicion;

	echo "<br>";
	echo "<br>";

	echo "Punto5: Ordena el array por orden de edad (de menor a mayor) y muestra la primera posición del array y la última. <br>";

	sort($alumnos);

		foreach ($alumnos as $indice => $clave) {

		echo "El alumno $indice tiene la edad $clave <br>";	
	}

	echo "<br>";
	echo "Primera posicion del Array";
	echo "<br>";
	echo "<br>";
	$posicion = reset($alumnos);
	echo $posicion;
	echo "<br>";

	echo "<br>";
	echo "Ultima posicion del Array";
	echo "<br>";
	echo "<br>";
	$posicion = end($alumnos);
	echo $posicion;
	echo "<br>";



 ?>


</body>
</html>