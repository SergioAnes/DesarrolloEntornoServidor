<?php


echo "<div align='center'>" . "Calculadora" . "</div><br><br>";

//obtengo los valores del formulario. 
$numero1 =  $_POST['operando1'];
$numero2 =  $_POST['operando2'];
$operacion =  $_POST['operacion'];


//compruebo los valores del formulario. Dependiendo de la opción escogida, la operación es diferente. 
	if (!strcmp("Suma", $operacion)) { //Recordemos que strcmp compara strigns. Si son iguales, da 0. Y yo quiero que haga la suma si son iguales, de ahí el signo de "!". -- Pasa a ser true cuando coinciden. 
		$resultado = suma($numero1, $numero2);

		echo "<div align='center'>" . "Resultado de la operacion: " . $resultado . "</div>";
	}

	if (!strcmp("Resta", $operacion)) {

		$resultado = resta($numero1, $numero2);

		echo "<div align='center'>" . "Resultado de la operacion: " . $resultado . "</div>";

	}

	if (!strcmp("Divide", $operacion)) {

		$resultado = divide($numero1, $numero2);

		echo "<div align='center'>" . "Resultado de la operacion: " . $resultado . "</div>";

	}


	if (!strcmp("Multiplica", $operacion)) {

		$resultado = multiplica($numero1, $numero2);

		echo "<div align='center'>" . "Resultado de la operacion: " . $resultado . "</div>";

	}



//funciones para cada operacion
function suma($numero1,$numero2) {

	$resultado = $numero1 + $numero2;

	return $resultado;

}

function resta($numero1,$numero2) {

	$resultado = $numero1 - $numero2;

	return $resultado;

}

function multiplica($numero1,$numero2) {

	$resultado = $numero1 * $numero2;

	return $resultado;

}

function divide($numero1,$numero2) {

	$resultado = $numero1 / $numero2;

	return $resultado;

}


?>