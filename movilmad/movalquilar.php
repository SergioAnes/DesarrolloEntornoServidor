<?php
    //1.- Se mira si hay o no una sesión abierta. 
    session_start();
    if (!isset($_SESSION["idcliente"])) { //
      exit("No estas logeado");
    } 

    // Si el carrito no ha sido inicializando, lo creamos
    if (!isset($_SESSION['CARROCOMPRA'])) {
        $_SESSION['CARROCOMPRA'] = array();
        $carroCompra = $_SESSION['CARROCOMPRA']; //el contenido del array de carroCompra se pasa a la variable $carroCompra sobre la que se va a trabajar.
    } else {$carroCompra = $_SESSION['CARROCOMPRA'];}
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
		<div class="card-header">Menú Usuario - ALQUILAR VEHÍCULOS</div>
		<div class="card-body">
			
	

	<!-- INICIO DEL FORMULARIO -->
	<form action="" method="post">
		<?php
		    require_once ("funciones/funcionesComunes.php");
		    $conexion = abrirConexion();
			if (!isset($_SESSION['idcliente'])){
				session_start();
			}
			$idcliente=$_SESSION['idcliente'];
			$fechaAlquiler = date("Y-m-d H:i:s");   
			echo"<div> Bienvenido: ".nombrecliente($idcliente,$conexion)."</div>";
			echo"<div> Identificador Cliente: ".$idcliente."</div>";
			echo"<div> vehículos disponibles en este momento: ".$fechaAlquiler."</div>";
		?>

		
			<B>Matricula/Marca/Modelo: </B>

			<select name="matricula" class="form-control">

			<?php
            $desplegableVehiculos= desplegableVehiculos($conexion); //Se despliegan los productos QUE TENGAN STOCK. 
                while ($fila=$desplegableVehiculos->fetch(PDO::FETCH_ASSOC)) {  
            ?>
                <option value="<?php echo $fila['matricula']?>"> <?php echo $fila['matricula'] . " " ;  echo $fila['marca'] . " "; echo $fila['modelo'];  ?> </option>
            <?php
                } //fin while
             ?>   
			</select>

            <B>Dias alquiler:</B>
            <input type="number" name="dias" placeholder="dias alquilado" value="1" min="1" class="form-control required">
			
		
		<BR> <BR><BR><BR><BR><BR>
		<div>
			<input type="submit" value="Agregar a Cesta" name="agregar" class="btn btn-warning disabled">
			<input type="submit" value="Realizar Alquiler" name="alquilar" class="btn btn-warning disabled">
			<input type="submit" value="Vaciar Cesta" name="vaciar" class="btn btn-warning disabled">
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
    <BR><a href="movwelcome.php">Volver al menú</a>
 <?php
	if($_POST){ 

            //recogida y limpieza de valores introducidos por el usuario.
            $matricula = test_input($_POST['matricula']);
            $dias = test_input($_POST['dias']);


            //Ahora hay que establecer las funciones para cada uno de los botones: 
            if (isset($_POST['agregar'])) {  
                        if (!array_key_exists($matricula, $carroCompra)) { //se comprueba si la matrícula existe el carro de la compra. 
                            $carroCompra[$matricula]=$dias; //Si el producto no estaba en el carro previamente, entonces se puede añadir. 
                            echo "Producto añadido correctamente <br>";
                            //variable de control por pantalla. 
                            //En el caso de que no estuviese y se agregue, debe desaparecer del desplegable. 
                            actualizarStock2($conexion,$carroCompra);
                            header("location:movalquilar.php");

                        }//fin if 
                            else {//Si el vehiculo está en el carro de la compra, se avisa al usu
                                echo "El artículo ya está en la cesta";
                            }//fin else
                $_SESSION['CARROCOMPRA'] = $carroCompra; //una vez que se ha añadido al array $carroCompra los productos, pasamos esos datos al array sesión para que se quede ahí guardado. 
            }// fin if agregar

            if (isset($_POST['vaciar'])) {//Si se pulsa el botón vaciar. Se vuelve a los orígenes.
                    actualizarStock1($conexion,$carroCompra);
                    $carroCompra = array();
                    $_SESSION['CARROCOMPRA'] = $carroCompra;

                    echo "cesta vaciada correctamente";
                    header("location:movalquilar.php");

            } //fin if vaciar

            	if (isset($_POST['alquilar'])) { //Si se pulsa el botón de comprar:
            		 $idcliente=$_SESSION['idcliente'];
            		//COMPROBAR SALDO DEL cliente en la cuenta asociada

            		$saldoCliente = consultaValor($conexion, "SELECT saldo FROM rclientes WHERE idcliente='$idcliente'");
            		echo $saldoCliente;

					

					if ($saldoCliente>='10') {

                        $fechaDevolucion="NULL";
                        $precioTotal="NULL";

						foreach ($carroCompra as $matricula => $dias) {
						
						insertarAlquileres($idcliente, $matricula, $fechaAlquiler, $conexion);

					}
						
					} else {
						echo "Tu saldo es inferior a 10, así que no puedes alquilar";
					}          			


            	}//fin alquilar 










     }//FIN POST 

 ?>  



  </body>
   
</html>

