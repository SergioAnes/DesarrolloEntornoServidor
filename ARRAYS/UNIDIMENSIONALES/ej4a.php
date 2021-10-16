<!DOCTYPE html>
<html>
<head>
	<title>E3a.php</title>
</head>
<body>


<?php 

echo "<table border=1 width=250px>";

	echo "<tr>" . "<td>" . "Indice" . "</td>" . "<td>" . "Binario" . "</td>" . "<td>" . "Octal" . "</td>";


$convertirNumeros=array();

	for ($i=0; $i<20; $i++) {
;
		$convertirNumeros[$i]= decbin($i);		

	}
	


$arrayInverso = array_reverse($convertirNumeros);

echo "<br>";
echo "<br>";

	for ($i=0; $i<20; $i++) {

		echo "<tr>" . "<td>" . $i . "</td>" . "<td>" . $arrayInverso[$i] . "</td>" . "<td>" . octdec($i) . "</td>" . "</tr>";

	}

echo "</table>";

 ?>

 </body>
</html>