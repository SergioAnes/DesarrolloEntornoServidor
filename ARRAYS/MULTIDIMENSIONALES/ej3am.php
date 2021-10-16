<!DOCTYPE html>
<html>
<head>
	<title>
		Ej3am.php
	</title>
</head>
<body>

<?php 


//crear una matriz de 3x5 mostrarla por pantalla imprimiendo los elementos por fila en primer lugar y a continuación por columna.
	
	
	$matriz3x5 = array(

					array (1,2,3,4,5),
					array(6,7,8,9,10),
					array(11,12,13,14,15)

	);
	
		
//imprimimos filas de la matriz

			for ($i=0; $i<3; $i++){

				echo "<br>";
				for ($j=0; $j<5; $j++) {

						echo $matriz3x5[$i][$j];
						echo " ";

				}
			}	

	echo "<br>";
	echo "<br>";
//imprimimos las columas de la matriz

			for ($i=0; $i<5; $i++){
					echo "<br>";

				for ($j=0; $j<3; $j++) {

					echo $matriz3x5[$j][$i];
					echo " ";

				}
			}	


 ?>

</body>
</html>