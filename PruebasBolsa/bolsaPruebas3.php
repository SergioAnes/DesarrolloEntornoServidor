
<!DOCTYPE html>
<html>
<head>
	<title>
		
		Probando la bolsa

	</title>
</head>
<body>


<?php 




echo "<table border='3' width='400px' style='text-align:center';>";
echo "<tr>" . "<td>" . "Nombre" . "</td>" . "<td>" . "Precio" . "</td>" . "<td>" . "Variacion" . "</td>" . "<td>" . "Volumen" . "</td>" . "<td>" . "Volumen" . "</td>" . "</tr>"; 


$nombre="Empresa ";
$numeroEmpresa=0;
$i=0;	
while ($i<=35) 



{
$Ibex35 = array($nombre => array (
										"Precio" => rand(),
										"VARIACION(%)" => rand(),
										"VARIACION(euros)" => rand(),
										"VOLUMEN" => rand()
));





	foreach ($Ibex35 as $empresa => $datos) {
			echo "<tr>" . "<td>" . $empresa . + $numeroEmpresa  . "</td>";

			foreach ($datos as $indice => $valor) {

					echo  "<td>" . $indice=$valor . "</td>";

			}


	}

	echo  "</tr>";

	$i++;		
	$numeroEmpresa++;

}


echo "</table>";

//como accedo de forma individual a cada uno de los elementos de ese array. 


 ?>


</body>
</html>