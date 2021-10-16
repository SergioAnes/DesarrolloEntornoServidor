
<!DOCTYPE html>
<html>
<head>
	<title>
		ej5am.php
	</title>
</head>
<body>


<?php 


//definir una matriz de 5x3 tal que en cada posición contenga el número que resulta de sumar el número que identifica la columna con el número que identifica la fila del mismo, imprimir los elementos de la matriz por columnas.


$matriz5x3= array();
$suma=0;


//darle valor a la matriz
 			for ($i=0; $i<5; $i++){
	
				for ($j=0; $j<3; $j++) {

					$suma=$i+$j;
					$matriz5x3[$i][$j]=$suma;
						
				}
			}
	
	//ahora hay que imprimir los elementos por columnas
			for ($i=0; $i<3; $i++){
	
					echo "<br>";
				for ($j=0; $j<5; $j++) {

						echo $matriz5x3[$j][$i];
						echo "<br>";
										
				}
			}





 ?>


</body>
</html>