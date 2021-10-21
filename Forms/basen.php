<?php


//SERGIO ANES

echo "<div align='center'>" . "Cambio de base" . "</div><br><br>";

//obtengo los valores del formulario. 
$numeroUsuario =  $_POST['numero'];
$nuevaBase = $_POST['nuevaBase'];


	convertidorbases($numeroUsuario, $nuevaBase);

function convertidorbases ($numero, $BaseActualizada) {

	$numeroSeparado = numeroPartes($numero);

	$numero = $numeroSeparado[0];
	$base = $numeroSeparado[1];

	$numeroConvertido = base_convert($numero, $base, $BaseActualizada);

	echo "<div align='center'> Numero $numero en base $base = $numeroConvertido en base $BaseActualizada </div>";

}


function numeroPartes ($cadenaNumero) {

	$separador="/";
	$separado = explode($separador, $cadenaNumero);

	return $separado;

}


?>