<!DOCTYPE html>
<html>
<head>
	<title>
		
		Ej2am.php
	</title>
</head>
<body>
	<?php 

	//una matriz de 3x3 con los sucesivos múltiplos de 2. Mostrar el contenido de la matriz por filas tal y como se indica en la figura.
	// 2 4 6
	// 8 10 12
	//14 16 18 


	$multiplosDos = array(
							array (2,4,6),
							array (8,10,12),
							array (14,16,18)
							);

//Se puede accer con bucle foreach;
	foreach ($multiplosDos as $matriz) {
		echo "<br>";

		foreach ($matriz as $valores) {

				echo $valores . " " ;
		}
	}

echo "<br>";
echo "<br>";
//O por un bucle normal
		for ($i=0; $i<3; $i++) {

			echo "<br>";
			for ($j=0; $j<3; $j++) {

				echo $multiplosDos[$i][$j]  . " ";
			}
		}

echo "<br>";
echo "<br>";

//haceer la fila de la suma y de las columas. Tiene que salir una columa y tres filas. Y una fila y tres columnas. 


//Se puede acceder con bucle for normal. Primero se suman las filas. 
	$sumaFilas=0;

		for ($i=0; $i<3; $i++) {

			$sumaFilas=0;

			for ($j=0; $j<3; $j++) {

				$sumaFilas+=$multiplosDos[$i][$j];
		
			}
			echo $sumaFilas;
			echo "<br>";
		}

		echo "<br>";
		echo "<br>";
//Se puede acceder con bucle for normal. Ahora sumamos las columnas. 

		$sumaColumnas=0;

		for ($i=0; $i<3; $i++) {

			$sumaColumnas=0;

			for ($j=0; $j<3; $j++) {

				$sumaColumnas+=$multiplosDos[$j][$i];
				echo " ";
		
			}
			echo $sumaColumnas;

		}



	?>

</body>
</html>