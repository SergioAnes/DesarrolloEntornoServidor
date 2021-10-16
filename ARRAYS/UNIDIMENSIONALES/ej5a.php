<!DOCTYPE html>
<html>
<head>
	<title>
		Ej5a y Ej6a.php
	</title>
</head>
<body>

<?php 

//ESTE EJERCICIO ES EL 5 Y EL 6. 


	$array1= array("Base de datos", "Entornos de Desarrollo", "Programacion");
	$array2=array("Sistemas informaticos", "FOL", "Mecanizado");
	$array3 = array ("Desarrollo Web1", "Desarrollo Web2", "Despliegue", "Desarrollo Interfaces", "Ingles");

	echo "<br>";

	echo "Resultado despues de meter los tres arrays dentro de un array general";

	echo "<br>";
	//unimos los tres arrays. Pero en este caso estaria creando dos dimensiones. 2 filas y distintas columnas. 
	$arrayUnidos = array(array("Base de datos", "Entornos de Desarrollo", "Programacion"), array("Sistemas informaticos", "FOL", "Mecanizado"), array("Desarrollo Web1", "Desarrollo Web2", "Despliegue","Desarrollo Interfaces", "Ingles"));

	print_r($arrayUnidos);

	echo "<br>";

	echo "Vamos a acceder a una de las asignaturas";

	echo "<br>";
	echo "<br>";

	echo $arrayUnidos[0][2]; //Ahora mismo accede a programacion
		echo "<br>";
	echo $arrayUnidos[1][1]; //accede a FOL
			echo "<br>";
	echo $arrayUnidos[2][4]; //accede a Ingles


	echo "<br>";
	echo "<br>";
	//con array_merge

	echo "Se unen con el ARRAY MERGE, PRIMERO UNO Y LUEGO OTRO";
		echo "<br>";
	$arrayUnidos1= array_merge($array1,$array2);
	$arrayUnidos2=array_merge($arrayUnidos1,$array3);
	print_r($arrayUnidos1);
		echo "<br>";
		echo "<br>";
	print_r($arrayUnidos2); //Este array es de una dimension y va hasta la posicion 10. 



	//con el array push 

	echo "<br>";
		echo "<br>";
		echo "Resultado despues de concatenar con un PUSH";
	array_push($array1, "Sistemas informaticos", "FOL", "Mecanizado", "Desarrollo Web1", "Desarrollo Web2", "Despliegue", "Desarrollo Interfaces", "Ingles");

	echo "<br>";

	print_r($array1);





	echo "<br>";


	$arrayprueba1= array("Base de datos", "Entornos de Desarrollo", "Programacion");
	$arrayprueba2=array("Sistemas informaticos", "FOL", "Mecanizado");
	$arrayprueba3 = array ("Desarrollo Web1", "Desarrollo Web2", "Despliegue", "Desarrollo Interfaces", "Ingles");
	//concatenando con un +.
	//$arrayprueba1 = ($arrayprueba1 + $arrayprueba2);

		echo "<br>";
		echo "Resultado despues de concatenar con un +";
				echo "<br>";

	//print_r($arrayprueba1 );

		echo "<br>";
		echo "<br>";
		echo "Resultado despues de concatenar con un PUSH";

		//si lo hago asi no funciona, me dice que $unionarrays es 11. Es decir, no me deja asociarlo a otra variable, es como que me da el numero de elementos que tiene. 
	$unionArrays=array();


	$unionArrays=array_push($arrayprueba1, "Sistemas informaticos", "FOL", "Mecanizado", "Desarrollo Web1", "Desarrollo Web2", "Despliegue", "Desarrollo Interfaces", "Ingles");

	echo "<br>";

	print_r($unionArrays);


	echo "<br>";


		echo "BORRAR EL DE MECANICA Y LUEGO INVERTIRLO CON UNSET. mecanizado ocupaba la poisicion 5 Y HA DESAPARECIDO PEOR NO CAMBIAN LOS VALORES DEL INDICE";

		unset($array1[5]); 

			echo "<br>";

		print_r($array1);
			echo "<br>";

	echo "SI QUEREMOS QUE SE REINDEXE, HAY QUE USAR ARRAY SPLICE";
	array_splice($arrayUnidos2, 5, 1); //el 5 es el valor que quiero que elimine y el 1 el numero de valores que, contando el 5, quiero que elimine. Aquí le digo quitame el 5 y solo 1 (solo el 5). 
		echo "<br>";

		print_r($arrayUnidos2);





 ?>

</body>
</html>