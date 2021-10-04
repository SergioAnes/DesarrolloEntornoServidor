
<!DOCTYPE html>
<html>
<head>
	<title>
		
		Probando la bolsa

	</title>
</head>
<body>


<?php 




echo "<table border='2' width='400px'>";
echo "<tr>" . "<td>" . "Nombre" . "</td>" . "<td>" . "Precio" . "</td>" . "<td>" . "Variacion" . "</td>" . "<td>" . "Volumen" . "</td>" . "<td>" . "Volumen" . "</td>" . "</tr>"; 


$i=0;	
while ($i<=35) 

{
$Ibex35 = array("Empresa " => array (
										"Precio" => rand(),
										"VARIACION(%)" => rand(),
										"VARIACION(euros)" => rand(),
										"VOLUMEN" => rand()
));





	foreach ($Ibex35 as $empresa => $datos) {
			echo "<tr>" . "<td>" . $empresa . + $i  . "</td>";

			foreach ($datos as $indice => $valor) {

					echo  "<td>" . $indice=$valor . "</td>";

			}


	}

	echo  "</tr>";

	$i++;		

}


echo "</table>";

//como accedo de forma individual a cada uno de los elementos de ese array. 


 ?>


</body>
</html>