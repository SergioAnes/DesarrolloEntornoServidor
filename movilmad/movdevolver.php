<?php
    //1.- Se mira si hay o no una sesión abierta. 
    session_start();
    if (!isset($_SESSION["idcliente"])) { //
      exit("No estas logeado");
    }else {
    	$idcliente=$_SESSION['idcliente'];
    }
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
		<div class="card-header">Menú Usuario - DEVOLUCIÓN VEHÍCULO </div>
		<div class="card-body">
	  
	   

	<!-- INICIO DEL FORMULARIO -->
	<form action="" method="post">
	
		<?php
		    require_once ("funciones/funcionesComunes.php");
		    $conexion = abrirConexion();
			echo"<div> Bienvenido: ".nombrecliente($idcliente,$conexion)."</div>";
			echo"<div> Identificador Cliente: ".$idcliente."</div>";
			
		?>
				
			<B>Matricula/Marca/Modelo: </B>

			<select name="vehiculos" class="form-control">
				
			<?php
            $desplegableVehiculos= desplegableVehiculos2($conexion, $idcliente); //Se despliegan los productos QUE TENGAN STOCK. 
                while ($fila=$desplegableVehiculos->fetch(PDO::FETCH_ASSOC)) {  
            ?>
                <option value="<?php echo $fila['matricula']?>"> <?php echo $fila['matricula'] . " " ;  echo $fila['marca'] . " "; echo $fila['modelo'];  ?> </option>
            <?php
                } //fin while
             ?>   
			</select>

		<BR><BR>
		<div>
			<input type="submit" value="Devolver Vehiculo" name="devolver" class="btn btn-warning disabled">
			<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
	<a href = "logout.php">Cerrar Sesion </a>
<?php 	
	 if($_POST){
	 		$matricula=test_input($_POST['vehiculos']);
            $idCliente = $_SESSION["idcliente"];

            if (isset($_POST['devolver'])) {
            	//Se calcula la diferencia entre la fecha en la que se alquila y el momento en el que se da a devolver (que genera otra fecha con datos presentes);
            	$fechaAlquiler = consultaValor($conexion, "SELECT fecha_alquiler from ralquileres WHERE matricula='$matricula'");
            	$d1 = strtotime($fechaAlquiler);
				$d2 = strtotime(date("Y-m-d H:i:s"));
				$fechadevolucion = date("Y-m-d H:i:s");
				$totalSecondsDiff = abs($d1-$d2); //42600225
				$totalMinutesDiff =  round($totalSecondsDiff/60);
				echo $totalMinutesDiff;
				echo "<br>";
           
           		//se calcula el precio total
            	$precioBase = consultaValor($conexion, "SELECT preciobase from rvehiculos WHERE matricula='$matricula'");
            	echo $precioBase;
            	echo "<br>";
            	$precioTotal = $precioBase*$totalMinutesDiff;
            	echo $precioTotal;

            	//Se actualizan las tablas: 
            	//de alquileres hay que actualizar la fecha de devolución y el precio total
            	actualizarAlquileres($conexion, $fechadevolucion, $precioTotal, $matricula, $idCliente);
            	actualizarVehiculos($conexion,$matricula);
            	actualizarSaldoClientes($conexion, $idCliente, $precioTotal);
            	header("location:movdevolver.php");
            	//de la de rvehiculos si está o no disponible
            	//de la de rclientes el saldo 

	 	}//fin boton devolver 

	 	 if (isset($_POST['volver'])) {
	 	 	header("location:movwelcome.php");
	 	 }

	 }//fin POST 	 	
?>

 </body>
   
</html>



