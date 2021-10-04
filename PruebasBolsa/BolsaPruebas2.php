
<!DOCTYPE html>
<html>
<head>
	<title>
		
		Probando la bolsa

	</title>
</head>
<body>


<?php 



$Ibex35 = array();

for ($i=0; $i<35; $i++){

	$nombre="Aus$i";
	$Ibex35[$nombre] = array (
		"Precio" => rand(),
		"Variacion" => rand(),
		"Var" => rand ()

		);



}

	var_dump($Ibex35);






 ?>


</body>
</html>