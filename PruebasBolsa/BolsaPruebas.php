
<!DOCTYPE html>
<html>
<head>
	<title>
		
		Probando la bolsa

	</title>
</head>
<body>


<?php 


$Ibex35 = array("Empresa " => array (
										"Nombre" => rand(),
										"Precio" => rand(),
										"VARIACION(%)" => rand(),
										"VARIACION(euros)" => rand(),
										"VOLUMEN" => rand()
));

$i=0;	
while ($i<=35) 

{

	foreach ($Ibex35 as $empresa => $datos) {
			echo $empresa . + $i  . "<br>";

			foreach ($datos as $indice => $valor) {

					echo "$indice=$valor <br>";

			}

	}

	echo "<br>";
	$i++;	

}



//como accedo de forma individual a cada uno de los elementos de ese array. 








 ?>


</body>
</html>