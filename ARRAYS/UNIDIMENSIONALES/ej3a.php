<!DOCTYPE html>
<html>
<head>
	<title>E3a.php</title>
</head>
<body>





<?php 



echo "El ejercicio está al final. En la parte inicial se realizan pruebas varias no relacionadas con el ejercicio en cuestion";


echo "<table border=1 width=250px>";

	echo "<tr>" . "<td>" . "Indice" . "</td>" . "<td>" . "Binario" . "</td>" . "<td>" . "Octal" . "</td>";


	echo "<br>";

	$indice="PastorAleman";
	$array=array("$indice" => array(4,5));



	print_r($array);


	echo "<br>";
	echo "<br>";

	echo $array['PastorAleman'][1];



	echo "<br>";
	echo "<br>";

	
	$probando= array(array(10,11), 
					array(12,12));

	print_r($probando);

	echo "<br>";
	echo "<br>";

	$probando=array();
	$perro=1;

	for ($i=0; $i<20; $i++) {

		for ($j=0; $j<2; $j++) {

			$probando[$i][$j] = $perro;
			$perro++;
		}

	}

print_r($probando);

echo "<br>";
echo "<br>";


$convertirNumeros=array();

	for ($i=0; $i<20; $i++) {

		$convertirNumeros[$i]= decbin($i);		

	}
	
print_r($convertirNumeros);


echo "<br>";
echo "<br>";

	for ($i=0; $i<20; $i++) {

		echo "<tr>" . "<td>" . $i . "</td>" . "<td>" . $convertirNumeros[$i] . "</td>" . "<td>" . octdec($i) . "</td>" . "</tr>";

	}

echo "</table>";

 ?>

 </body>
</html>