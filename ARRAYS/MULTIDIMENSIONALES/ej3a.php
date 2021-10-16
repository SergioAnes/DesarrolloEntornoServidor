<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio ej3a.php </title>
</head>
<body>

	<?php 


	echo "<table border='1' width='250px'>";
	echo "<tr>" . "<td>" . "Indice" . "</td>" . "<td>" . "Binario" . "</td>" . "<td>" . "Octal" . "</td>" . "</tr>";

	$contador=0;
	$numeroBinario=decbin($contador);
	$numerosOctal=decbin($contador);

	$numerosBinarios=array($contador => array($numeroBinario, $numerosOctal));


	while ($contador<=20) {

		$numerosBinarios[$contador]="$numeroBinario";
		$contador++;

	}


echo "</table>";

	var_dump($numerosBinarios);

	 ?>

</body>
</html>