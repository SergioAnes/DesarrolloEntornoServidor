
<?php

echo "<div align='center'>" . "Calculadora" . "</div><br><br>";

$numero1 =  $_POST['operando1'];
$numero2 =  $_POST['operando2'];
$operacion =  $_POST['operacion'];

include("calculadora1.php");

?>