<!DOCTYPE html>
<html>
<head>
	<title> Ejercicio 2b de bucles</title>
</head>
<body>

<?php 

//ejercicioBucles. Transformar de decimal a cualquier otra base. 
//Aquí en vez de pasarle el número por parámetro a la función he optado por meterlo todo dentro, por hacerlo algo diferente y recordar funcionamientos. 
	

	function CambioBase (){ 

		$numero = 48; 
		echo "El numero decimal es: $numero ";

		$nuevaBase= 6;
		$resultadosresto= array(); 

		while ($numero > 0){ 
			$cociente = $numero/$nuevaBase;
			$resto = $numero%$nuevaBase;
			$resultadosresto[]= $resto;
			$numero = intval($cociente); 

		}	

		$longitudArray = count($resultadosresto); 
		$resultadosresto = array_reverse($resultadosresto); 


		echo "Y con la nueva base es: ";

		for ($i=0; $i<$longitudArray; $i++) { 

			echo "$resultadosresto[$i]";

		}

	}
	

	CambioBase(); 






 ?>



</body>
</html>
