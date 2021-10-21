<?php

//SERGIO ANES

echo "<div align='center'>" . "Conversor de decimales" . "</div><br><br>";

$decimal = ($_POST["decimal"]);


convertirDecimal($decimal);
	

function convertirDecimal ($numero) {

	$resultado = decbin($numero);

	echo "<div align='center'>" .  "Numero decimal ". "<input type='text' name='decimal' value='$numero' size=15><br></div>";

	echo "<div align='center'>" . "Numero Binario ". "<input type='text' name='convertido' value='$resultado ' size=15><br></div>";

}




?>