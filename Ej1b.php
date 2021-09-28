<!DOCTYPE html>
<html>
<head>
	<title> Ejercicio 1b de bucles</title>
</head>
<body>

<?php 

//ejercicioBucles. Transformar de decimal a binario SOLO usando bucles. 

//Necesito. 

	$numero = 168; 
	echo "El numero decimal es: $numero ";

	function obtenbinario ($numero){ //creamos una funcion que actúa sobre un número que establecemos al comienzo. En el ejemplo, 168. 

		$resultadosresto= array(); //Se crea un Array para ir almacenando los restos que componen el binario. 

		while ($numero > 0){ //mientras el numero (dividendo) sea maypr que cero, hace esto: Al ser 0 ya para (1/2 sería 0,5, pero nosotros queremos el entero, el 0), por eso luego se usa intval. 

			$cociente = $numero/2;
			$resto = $numero%2;
			$resultadosresto[]= $resto;
			$numero = intval($cociente); //redondeamos a un numero int. Así llega al cero. 
		}

		$longitudArray = count($resultadosresto); //establecemos la longitud del array
		$resultadosresto = array_reverse($resultadosresto); //le damos la vuelta a lo que YA está almacenado en el ARRAY. 

		for ($i=0; $i<$longitudArray; $i++) { //imprimimos los valores para que al llamar a la función salgan por pantalla. 

			echo "$resultadosresto[$i]";

		}



	}//fin de la funcion.
	

	echo "Y en binario es: ";

	obtenbinario($numero); //hacemos la llamada a la función. 





 ?>



</body>
</html>
