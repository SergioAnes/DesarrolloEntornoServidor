<html>
<head>
	<title>
		Datos Ejercicio 7 PHP FORMULARIOS
	</title>
	<style>
		.error {color: #FF0000;}
	</style>	
</head>
	<body>

		<?php 

   			include ("datosfunciones.php"); //Si no lo pongo aquí arriba daba error. 

		 ?>

	<h1> DATOS ALUMNOS </h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	
		Nombre:
		<input type='text' name='nombre' value='' size=15> *Campo obligatorio 
		<span class="error">* <?php echo $nombre1error;?></span> <br><br>
		Apellido1:
		<input type='text' name='apellido1' value='' size=15>  <br><br>
		<span class="error">* <?php echo $apellido1error ;?></span>
		Apellido2:
		<input type='text' name='apellido2' value='' size=15> <br><br>
		<span class="error"> <?php echo $apellido2error;?></span>
		Email:
		<input type='text' name='email' value='' size=15> *Campo obligatorio 
		<span class="error">* <?php echo $emailerror;?></span><br><br>

		Sexo: 
		<input type="radio" name="gender" value="Mujer"> Mujer
  		<input type="radio" name="gender" value="Hombre"> Hombre *Campo obligatorio 
  		<span class="error">* <?php echo $genero1error;?></span> 
  		
		<br><br>
		<input type="submit" name="button" value="Enviar">

		<input type="reset" value="borrar">
		<br><br>




		   <?php
	

		echo "<table border='1' width=400>";

			echo "<tr>" . "<td>" . "Nombre" . "</td>" . "<td>" . "Apellidos" . "</td>" . "<td>" . "email" . "</td>" . "<td>" . "sexo" . "</td>" ."</tr>";	
			echo "<tr>" . "<td>" . $nombre1 . "</td>" . "<td>" . $apellido1 . " " . $apellido2 . "</td>" . "<td>" . $email . "</td>" . "<td>" . $genero1 . "</td>" ."</tr>";

		echo "</table>";


			?>

		</form>
	</body>
</html>