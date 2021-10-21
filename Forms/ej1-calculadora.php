<?php



echo "<div align='center'>" . "Calculadora" . "</div><br><br>";


$numero1 =  $_POST['operando1'];
$numero2 =  $_POST['operando2'];
$operacion =  $_POST['operacion'];


calculadora($numero1, $numero2, $operacion);


function calculadora($operando1, $operando2, $operacion) {
	
	 echo "<div align='center'>" . "El primer numero es " . $operando1 . " y el segundo numero es " . $operando2 . "</div><br><br>";

	switch ($operacion) {
		case 'Suma':
			 echo "<div align='center'>" . "Resultado de la operacion: " . $operando1 + $operando2 . "</div>";
			break;
		case 'Resta':
			 echo "<div align='center'>" . "Resultado de la operacion: " . $operando1 - $operando2 . "</div>";
			break;
		case 'Divide':
			 echo "<div align='center'>" . "Resultado de la operacion: " . $operando1 / $operando2 . "</div>";
			break;
		case 'Multiplica':
			 echo "<div align='center'>" . "Resultado de la operacion: " . $operando1 * $operando2 . "</div>";
			break;		
		default:
			echo "Algo ha fallado. Intenta de nuevo";
			break;
	}
}


?>
