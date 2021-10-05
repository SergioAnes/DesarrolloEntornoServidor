<!DOCTYPE html>
<html>
<head>
	<title>
		
		Probando la bolsa

	</title>
</head>
<body>


<?php 



$nombre = "E";
$i = 0;

$Ibex35=array();

while ($i <= 34) {
    $i++;

    $Ibex35 ["$nombre$i"] =  array(
        "Precio" => rand(),
        "VARIACION(%)" => rand(),
        "VARIACION(euros)" => rand(),
        "VOLUMEN" => rand()
    );
}  

	var_dump($Ibex35);


echo "Imprime el valor que tu quieras <br>";
echo $Ibex35["E1"]["Precio"];



 ?>


</body>
</html>