<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Primitiva HTML</title>
</head>
<body>
	<img src="primitiva.jpg">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	<p>Fecha del sorteo <input type='date' name='fechasorteo' size=15 required><br>
	<p>Recaudación Sorteo <input type='text' name='recaudacion' size=10 required><br>
		<p>Pulsa para generar combinación ganadora: <input type="submit" value="Combinacion" name="combinacion"></p>
	</form>


<?php 


	include("r22_funciones.php");

	if (isset($_POST["combinacion"])) { //Solo entra al juego si se pulsa el boton de combinación. 
		$numerosGanadores= numerosGanadores(); //Se generan los numeros GANADORES
		$ganadores= jugarPrimitiva($numerosGanadores); //Se comparan esos numeros ganadores con las APUESTAS de la gente (metidas en un fichero en este caso);
		crearFichero($ganadores); //Se crea un fichero con los resultados y los premios a repartir. 
		//FALTA IMPRIMIR POR PANTALLA TODO. 
		imprimirPrimitiva($numerosGanadores, $ganadores);
	}//fin isset 
 ?>


</body>
</html>