<?php
    session_start();
    if(isset($_SESSION["CustomerNumber"])){
?>
<html>
<?php echo "Has iniciado sesion: ". $_SESSION['CustomerNumber'];?>    
<head>
	<title>Menú de Inicio</title>
	<meta charset="utf-8" />
	<meta name="author" value="Sergio Anes" />
</head>
<body>
	<h1>Web Pedidos</h1>
	<p> Índice:</p>
	<ul>
		<li><a href="pe_login.php">[01] - Inicio de Sesión</a></li>
		<li><a href="pe_altaped.php">[02] - ALTA PEDIDOS </a></li>
	</ul>
	<br><br>
	 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		<input type="submit" value="Cerrar Sesion" name="cerrarSesion"/>
	</form>

<?php
    } else{
        header("location:pe_login.php"); 
    }
     if (isset($_POST["cerrarSesion"])) {
            session_start();
    		session_destroy();
    		header("location:pe_login.php");
     }//fin if
?>

</body>
</html
