<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio ej2a.php </title>
</head>
<body>

	<?php 


	echo "<table border='1' width='250px'>";
	echo "<tr>" . "<td>" . "Indice" . "</td>" . "<td>" . "Valor" . "</td>" . "<td>" . "Suma" . "</td>" . "</tr>";

	$contadorImpares=0;
	$numerosImpares=1;

	$arrayimpares=array($contadorImpares=>$numerosImpares);

	while ($contadorImpares<20) {

		$arrayimpares[$contadorImpares]="$numerosImpares";
		$numerosImpares+=2;
		$contadorImpares++;

	}

	//Imprimimos los valores del Array. 

	$suma=0;
	foreach ($arrayimpares as $indice=>$valor) {

	
		echo "<tr>" . "<td>" . "$indice" . "</td>" . "<td>" . "$valor" . "</td>" . "<td>" . ($suma+=$valor) . "</td>" . "</tr>"; //me daba error porque ($indice+$valor) no estaba entre paréntesis. 

	}

		echo "</table>";

		$numeroImpar=1;
		$i=0;
		$sumaImpares=0;
		$sumaPares=0;
		$numeroPar=0;


		while ($i<10) {
			$sumaImpares+=$arrayimpares[$numeroImpar];
			$sumaPares+=$arrayimpares[$numeroPar];
			$numeroImpar+=2;
			$numeroPar+=2;
			$i++;

		}
		
		$mediaImpares = $sumaImpares/10;
		$mediaPares = $sumaPares/10;
		echo "La media de los impares es $mediaImpares <br>";
		echo "La media de los pares es $mediaPares";

	 ?>

</body>
</html>

