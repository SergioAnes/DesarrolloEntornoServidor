
<!DOCTYPE html>
<html>
<head>
	<title>
		
		ej4am.php
	</title>
</head>
<body>


	<?php 

//mostrar la fila y columna del elemento mayor.

	$matriz3x5 = array(

					array (1,2,3,4,5),
					array(6,7,8,9,10),
					array(11,12,13,14,15)

	);

		$mayor=$matriz3x5[0][0];
		$numeroColumna=0;
		$numeroFila=0;

			for ($i=0; $i<3; $i++){
	
				for ($j=0; $j<5; $j++) {

					if ($matriz3x5[$i][$j] > $mayor) {

						$mayor = $matriz3x5[$i][$j];
						$numeroFila=$i;
						$numeroColumna=$j;
 
					}
					
				}
			}	


			echo "El numero mas grande es $mayor y esta en la fila $numeroFila y en la columna $numeroColumna";

			echo "<br>";
			echo "<br>";

			//sabiendo lo anterior ya se puede imprimir la fila del numero. 

			echo "La fila en la que se encuentra el numero es: <br>";

			for ($i=$numeroFila; $i<3; $i++){
	
				for ($j=0; $j<5; $j++) {

						echo $matriz3x5[$i][$j];
						echo " ";

				}
			}


			//sabiendo lo anterior ya se puede imprimir la columna del numero. 
			echo "<br>";
			echo "<br>";

			echo "La columna en la que se encuentra el numero es: <br><br>";

			for ($i=$numeroColumna; $i<5; $i++){
	
				for ($j=0; $j<3; $j++) {

						echo $matriz3x5[$j][$i];
						echo " ";

				}
			}





	 ?>

</body>
</html>