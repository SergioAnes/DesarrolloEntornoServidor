<html>
<head>
	<title> Ejercicio 3 Sergio Anes</title>
	<style>
		
		table {width: 500;border: green 2px solid;}

		 td {border: 1px solid red;}
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

	$filas=0; //variable filas que vaya contando. 

	while (!feof($fichero)) { //hasta que no llegue al final del archivo, sigue leyendo

	$linea=fgets($fichero); //lo que se lee se pasa a una variable linea que cuyo contenido se ira imprimiendo luego

	contenido($linea); //llamada a la funcion para que saque los datos de las lineas

	$filas++;

 
}	
	$filas=$filas-1; //Esto seguramente sea una chapuza, pero sale. 
	echo "Filas recorridas: $filas"; //Hace tres pasadas por el bucle aunque tengo dos líneas. ¿Será por el salto de línea que el puse en el primer ejercicio? 
	fclose($fichero); //cierre del fichero abierto



	function contenido($datosPersonales) {

		$nombre = substr($datosPersonales, 0, 40); //ESTO NO ES PRINCIPIO Y FINAL. ES PRINCIPIO Y LONGITUD QUE QUIERO QUE ME COJA. 
		$apellido1 = substr($datosPersonales, 41, 40);
		$apellido2 = substr($datosPersonales, 82, 41);
		$nacimiento = substr($datosPersonales, 124, 11);
		$localidad = substr($datosPersonales, 134, 27);


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