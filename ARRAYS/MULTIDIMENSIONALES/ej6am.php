<!DOCTYPE html>
<html>
<head>
	<title>
		ej6am.php
	</title>
</head>
<body>


<?php 


//matriz de 3x3 con números aleatorios. Generar un array que contenga los valores máximos de cada fila y otro que contenga los promedios de la mismas. Mostrar el contenido de ambos arrays por pantalla.


	$arrayAleatorios=array();


	//primero llenamos el array con valores random. 

	for ($i=0; $i<3; $i++){

		for ($j=0; $j<3; $j++) {

			$arrayAleatorios[$i][$j] = rand(); 			
		}

	}

	//visualizamos el rand para ver qué numeros han salido. 

	var_dump($arrayAleatorios);

	//localizar cual es el valor maximo de cada fila
	$mayor1=$arrayAleatorios[0][0];
	$mayor2=$arrayAleatorios[1][0];
	$mayor3=$arrayAleatorios[2][0];

		for ($i=0; $i<3; $i++){

			for ($j=0; $j<3; $j++) {

				if ($arrayAleatorios[$i][$j]>$mayor1 && $i==0) {

					$mayor1=$arrayAleatorios[$i][$j];
				}

				if ($arrayAleatorios[$i][$j]>$mayor2 && $i==1) {

					$mayor2=$arrayAleatorios[$i][$j];
				}
			
				if ($arrayAleatorios[$i][$j]>$mayor3 && $i==2) {

					$mayor3=$arrayAleatorios[$i][$j];
				}

			}

		}

		//Ahora hay que meter los maximos sacados en un array.
		$arrayMaximos=array($mayor1, $mayor2, $mayor3); 

				echo "<br>";
				echo "El mayor numero de la fila1 es $mayor1, el de la fila2 es $mayor2 y el de la fila 3 es $mayor3";
				echo "<br><br>";

			print_r($arrayMaximos);

				echo "<br><br>";
		//ahora hay que hacer el promedio de las filas y sacarlos por array 

			$arrayPromedio=array();
				for ($i=0; $i<3; $i++){

						$sumaFilas=0;

					for ($j=0; $j<3; $j++) {

						$sumaFilas+=$arrayAleatorios[$i][$j];
						echo "<br>";

					}

					array_push($arrayPromedio, $promediofilas = $sumaFilas/count($arrayAleatorios));
				}

					echo "Imprimimos el array de los promedios de cada fila <br><br>";
					print_r($arrayPromedio);



 ?>

</body>
</html>