<?php
    session_start();
    require_once ("funciones/funcionesComunes.php");
    //ABRIMOS CONEXIÓN CON LA BASE DE DATOS
    $conexion = abrirConexion();
    //INICIAMOS LA SESIÓN
?>

<html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a MovilMAD</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
 </head>
   
 <body>
    <h1>Servicio de ALQUILER DE E-CARS</h1> 

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - OPERACIONES </div>
		<div class="card-body">
			
		<?php
			if (!isset($_SESSION['idcliente'])){
				session_start();
			} else {
			$idcliente=$_SESSION['idcliente'];
			echo"<div> Bienvenido: ".nombrecliente($idcliente,$conexion)."</div>";
			echo"<div> Identificador Cliente: ".$idcliente."</div>";
		}
		?>
	 
		
       <!--Formulario con botones -->
	
		<input type="button" value="Alquilar Vehículo" onclick="window.location.href='movalquilar.php'" class="btn btn-warning disabled">
		<input type="button" value="Consultar Alquileres" onclick="window.location.href='movconsultar.php'" class="btn btn-warning disabled">
		<input type="button" value="Devolver Vehículo" onclick="window.location.href='movdevolver.php'" class="btn btn-warning disabled">
		</br></br>
		
		
		
		   <BR><a href="logout.php">Cerrar Sesión</a>
		   <BR><a href="logout.php">Volver al menú</a>
	</div>  
	  
	  
     
   </body>
   
</html>


