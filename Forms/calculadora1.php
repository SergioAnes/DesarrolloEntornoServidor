<?php



echo "<div align='center'>" . "Calculadora" . "</div><br><br>";


$numero1 =  $_POST['operando1'];
$numero2 =  $_POST['operando2'];
$operacion =  $_POST['operacion'];


calculadora($numero1, $numero2, $operacion);


function calculadora($operando1, $operando2, $operacion) {
	
	echo "<div align='center'>" .  "Operando1 ". "<input type='text' name='operando1' value='$operando1' size=15><br></div>";
	echo "<div align='center'>" . "Operando2 ". "<input type='text' name='operando2' value='$operando2' size=15><br></div>";

	switch ($operacion) {
		case 'Suma':
			 echo "<div align='center'>" . "Resultado de la operacion: " . ($operando1+$operando2) . "</div>";
			break;
		case 'Resta':
			 echo "<div align='center'>" . "Resultado de la operacion: " . ($operando1 - $operando2) . "</div>";
			break;
		case 'Divide':
			 echo "<div align='center'>" . "Resultado de la operacion: " . ($operando1 / $operando2) . "</div>";
			break;
		case 'Multiplica':
			 echo "<div align='center'>" . "Resultado de la operacion: " . ($operando1 * $operando2) . "</div>";
			break;		
		default:
			echo "Algo ha fallado. Intenta de nuevo";
			break;
	}
}


?>