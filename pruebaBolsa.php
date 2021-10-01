<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio ej2a.php </title>
</head>
<body>

	<?php 
	
	$Inditex = [
    "precio" => 31.680,
    "variacion" => 0.44,
    "varporcen" => 1,
    "volTitulos" => 588.355,
    "VolumenEuros" => 18.600
];
	echo $Inditex["precio"]; 
	echo "<br>";
	echo $Inditex["variacion"];


	$Ibex35 = array (array("Inditex",10,20,30,40,50),array("Endesa",10,20,30,40,50),array("Endesa",10,20,30,40,50));

	 foreach($Ibex35 as $clave => $valor) 
 	{
    echo "Empresa: ".$clave;
	
	foreach ($valor as $indice => $cotizacion)
	  echo " ".$cotizacion;
	  
	echo "<br>";
 	}


	
	 ?>

</body>
</html>

