<?php

//SERGIO ANES

echo "<div align='center'>" . "Calculadora" . "</div><br><br>";


function calcular ($calculo) {
//compruebo los valores del formulario. Dependiendo de la opción escogida, la operación es diferente. 
	if (!strcmp("Suma", $calculo)) { //Recordemos que strcmp compara strigns. Si son iguales, da 0. Y yo quiero que haga la suma si son iguales, de ahí el signo de "!". -- Pasa a ser true cuando coinciden. 

		global $numero1;
		global $numero2;

		$resultado = suma($numero1, $numero2);

		echo "<div align='center'>" . "Resultado de la operacion: " . $resultado . "</div>";
	}

	if (!strcmp("Resta", $calculo)) {

		global $numero1;
		global $numero2;

		$resultado = resta($numero1, $numero2);

		echo "<div align='center'>" . "Resultado de la operacion: " . $resultado . "</div>";

	}

	if (!strcmp("Divide", $calculo)) {

		global $numero1;
		global $numero2;

		$resultado = divide($numero1, $numero2);

		echo "<div align='center'>" . "Resultado de la operacion: " . $resultado . "</div>";

	}


	if (!strcmp("Multiplica", $calculo)) {

		global $numero1;
		global $numero2;

		$resultado = multiplica($numero1, $numero2);

		echo "<div align='center'>" . "Resultado de la operacion: " . $resultado . "</div>";

	}
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