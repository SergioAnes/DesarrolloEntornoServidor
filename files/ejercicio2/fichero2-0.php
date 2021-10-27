<HTML>
<HEAD> <TITLE> Ficheros </TITLE>
	<style> 

	.error {color: #FF0000;}
	</style>
</HEAD>
<BODY>

	<?php 

   		include ("fichero2-1.php"); 

	 ?>

	<h1> Ficheros2 </h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  


Nombre:
<input type='text' name='nombre' value='' size=15><br><br>

Apellido1:
<input type='text' name='apellido1' value='' size=15><br><br>


Apellido2:
<input type='text' name='apellido2' value='' size=15><br><br>


FechaNacimiento:
<input type='text' name='fnacimiento' value='' size=15>
<span class="error"> * <?php echo $fechaError;?> </span> <br><br>


Localidad:
<input type='text' name='localidad' value='' size=15><br><br>

<br><br>

<input type="submit" value="enviar">

<input type="reset" value="borrar">

</FORM>
</BODY>
</HTML>
