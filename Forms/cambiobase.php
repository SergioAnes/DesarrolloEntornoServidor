<?php


//SERGIO ANES

$decimal =  $_POST['decimal'];
$opcionElegida =  $_POST['conversion'];


	convertirNumero($opcionElegida);

function convertirNumero ($convierte) {


	if (!strcmp("binario", $convierte)) {

		global $decimal;

		$resultado = convertirBinario($decimal);


		echo "<div align='center'>" .  "Numero decimal ". "<input type='text' name='decimal' value='$decimal' size=15><br></div>";
		echo "<table border='2px' align='center' width='250px'>";
		echo "<tr><td>" . $convierte . "</td> . <td>" . $resultado. "</td></tr></div>";
		echo "</table>";
	}


	if (!strcmp("octal", $convierte)) {

		global $decimal;

		$resultado = convertirOctal($decimal);

			
		echo "<div align='center'>" .  "Numero decimal ". "<input type='text' name='decimal' value='$decimal' size=15><br></div>";
		echo "<table border='2px' align='center' width='250px'>";
		echo "<tr><td>" . $convierte . "</td> . <td>" . $resultado. "</td></tr></div>";
		echo "</table>";

	}


	if (!strcmp("hexadecimal", $convierte)) {

		global $decimal;

		$resultado = convertirHexadecimal($decimal);

			
		echo "<div align='center'>" .  "Numero decimal ". "<input type='text' name='decimal' value='$decimal' size=15><br></div>";
		echo "<table border='2px' align='center' width='250px'>";
		echo "<tr><td>" . $convierte . "</td> . <td>" . $resultado. "</td></tr></div>";
		echo "</table>";
	}

	if (!strcmp("todos", $convierte)) {

		global $decimal;


		$resultado1 = convertirBinario($decimal);
		
		$resultado2 = convertirOctal($decimal);

		$resultado3 = convertirHexadecimal($decimal);

			
		echo "<div align='center'>" .  "Numero decimal ". "<input type='text' name='decimal' value='$decimal' size=15><br></div>";
		echo "<table border='2px' align='center' width='250px'>";
		echo "<tr><td>" . "Binario" . "</td> . <td>" . $resultado1. "</td></tr></div>";
		echo "<tr><td>" . "Octal" . "</td> . <td>" . $resultado2. "</td></tr></div>";
		echo "<tr><td>" . "Hexadecimal" . "</td> . <td>" . $resultado3. "</td></tr></div>";
		echo "</table>";



	}

}





function convertirBinario ($numero) {

	$resultado = decbin($numero);

	return $resultado;

}

function convertirOctal ($numero) {

	$resultado = decoct($numero);

	return $resultado;

}


function convertirHexadecimal ($numero) {

	$resultado = dechex($numero);

	return $resultado;

}





?>