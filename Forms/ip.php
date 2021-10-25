<HTML>
<HEAD> <TITLE> Ip </TITLE>
</HEAD>
<BODY>

	<h1 align="center"> Direcciones IP </h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  


Ip notacion decimal:
<input type='text' name='decimal' value='' size=15><br>

<br><br>
<input type="submit" name="button" value="Notacion binaria">

<input type="reset" value="borrar">


<?php 


include ("ipfunciones.php");

if (isset($_POST["button"])) {

	$decimal = $_POST['decimal'];

	conversionIp($decimal);

}


 ?>




</FORM>
</BODY>
</HTML>
