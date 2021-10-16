<!DOCTYPE html>
<html>
<head>
	<title> ej1am.php </title>
</head>
<body>



<?php 


$matriz= array (

	array (2, 4, 6),
	array (8, 10, 12),
	array (14, 16, 18)


);

	echo "<table border='1' width='250px'>";

	foreach($matriz as $filadenumeros){

		echo  "<tr>";


    	foreach($filadenumeros as $elnumero){

        echo  "<td>" . $elnumero . "</td>"; 
    }

    	echo "</tr>";
    	echo "<br>";

}

	echo "</table>";

	echo "<br>";

	//por aclarar los conceptos. 

	echo "A la matriz se puede acceder tambien posicion por posicion, por lo que podria sacarse con un bucle normal: ";
	echo "<br>";
	echo $matriz[0][0]; echo " ";
	echo $matriz[0][1]; echo " ";
	echo $matriz[0][2]; echo " ";
	echo "<br>";
	echo $matriz[1][0]; echo " ";
	echo $matriz[1][1]; echo " ";
	echo $matriz[1][2]; echo " ";
	echo "<br>";
	echo $matriz[2][0]; echo " ";
	echo $matriz[2][1]; echo " ";
	echo $matriz[2][2]; echo " ";
	echo "<br>";



 ?>





</body>
</html>