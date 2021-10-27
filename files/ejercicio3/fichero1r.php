<html>
<head>
	<title> Ejercicio 3 Sergio Anes</title>
	<style>
		
		table {width: 500;border: green 2px solid;}

		 td {border: 1px solid #000;}
	</style>
</head>
<body>

	<table>  
		<tr>
		<td> Nombre </td>
		<td> Apellido1 </td>
		<td> Apellido2 </td>
		<td> Fecha nacimiento</td>
		<td> Localidad </td>
		</tr>


<?php 


$fichero = fopen("../ejercicio1/alumnos1.txt", "r"); //apertura fichero para leer

	$filas=0; 

	while (!feof($fichero)) { //hasta que no llegue al final del archivo, sigue leyendo

	$linea=fgets($fichero); //lo que se lee se pasa a una variable linea que cuyo contenido se ira imprimiendo luego

	contenido($linea); //llamada a la funcion para que saque los datos de las lineas

	$filas++;

 
}	
	echo "Filas recorridas: $filas"; //Hace tres pasadas por el bucle aunque tengo dos líneas. ¿Será por el salto de línea que el puse en el primer ejercicio? 
	fclose($fichero); //cierre del fichero abierto



	function contenido($datosPersonales) {

		$nombre = substr($datosPersonales, 0, 40);
		$apellido1 = substr($datosPersonales, 41, 81);
		$apellido2 = substr($datosPersonales, 82, 123);
		$nacimiento = substr($datosPersonales, 124, 133);
		$localidad = substr($datosPersonales, 134, 160);


		echo " 

			<tr>
			<td> $nombre </td>
			<td> $apellido1 </td>
			<td> $apellido2 </td>
			<td> $nacimiento</td>
			<td> $localidad </td>
			</tr>";


	}//fin de la funcion de la que se obtienen los datos

 ?>


</table>

</body>
</html>