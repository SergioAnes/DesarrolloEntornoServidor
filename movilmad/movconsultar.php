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
		<div class="card-header">Menú Usuario - CONSULTA ALQUILERES </div>
		<div class="card-body">
	  
	  	

	<!-- INICIO DEL FORMULARIO -->
	<form action="" method="post">
				
		<?php
		    require_once ("funciones/funcionesComunes.php");
		    $conexion = abrirConexion();
			echo"<div> Bienvenido: ".nombrecliente($idcliente,$conexion)."</div>";
			echo"<div> Identificador Cliente: ".$idcliente."</div>";
			
		?>
		     
			 Fecha Desde: <input type='date' name='fechadesde' value='' size=10 placeholder="fechadesde" class="form-control">
			 Fecha Hasta: <input type='date' name='fechahasta' value='' size=10 placeholder="fechahasta" class="form-control"><br><br>
				
		<div>
			<input type="submit" value="Consultar" name="consultar" class="btn btn-warning disabled">
		
			<input type="submit" value="Volver" name="Volver" class="btn btn-warning disabled">
		
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
    <a href = "logout.php">Cerrar Sesion</a>

<?php 

	 if($_POST){
	 		      $fechadesde = test_input($_POST['fechadesde']);
            $fechahasta = test_input($_POST['fechahasta']);
            $idCliente = $_SESSION["idcliente"];

            if (isset($_POST['consultar'])) {

            	$consultaAlquileres = consultar($conexion, "SELECT rvehiculos.matricula as matricula, rvehiculos.marca as marca, rvehiculos.modelo as modelo, ralquileres.fecha_alquiler as fechaAlquiler, ralquileres.fecha_devolucion as devolucion, ralquileres.preciototal as preciototal FROM rvehiculos, ralquileres WHERE rvehiculos.matricula=ralquileres.matricula AND ralquileres.idcliente='$idCliente' AND ralquileres.fecha_alquiler>=$fechadesde ORDER BY fechaAlquiler desc");

            	echo "<br> <br> <table border='2'>";
                  echo "<thead> <tr> <th colspan='6'> Vehículos alquilados </th> </tr> </thead>
                  <tbody>
                  <tr> <th> matricula </th> <th> marca </th> <th> modelo </th>  <th> fechaAlquiler </th> <th> devolucion </th> <th> preciototal </th> </tr>";
                  foreach ($consultaAlquileres as $cadaDato) {
               
                      echo   "<tr>
                                  <td>".$cadaDato['matricula']."</td>
                                  <td>".$cadaDato['marca']."</td>
                                  <td>".$cadaDato['modelo']."</td>
                                  <td>".$cadaDato['fechaAlquiler']."</td>
                                  <td>".$cadaDato['devolucion']."</td>
                                  <td>".$cadaDato['preciototal']."</td>
                              </tr>";
                  }
                  echo "</tbody></table>";
                  echo "<br>";
	 	}//fin boton consultar 

	 	 if (isset($_POST['Volver'])) {
	 	 	header("location:movwelcome.php");
	 	 }

	 }//fin POST 	 
?>
  </body>
</html>
