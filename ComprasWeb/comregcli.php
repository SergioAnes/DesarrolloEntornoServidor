<HTML>
<HEAD> 
    <TITLE> Ejercicio 10 Sergio Anes</TITLE> 
</HEAD>
<BODY>
    <h1> Desarrollar un formulario para Registro de clientes (comregcli.php) Al darse de alta, se les proporcionará como nombre de usuario su nombre y como clave el apellido escrito de manera inversa. Realizar en la base de datos las modificaciones que se estimen oportunas. </h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

     Introduce nombre: <br>
        <input type="text" name="nombre" required> </input> <br>
        <br>   
     Introduce apellido: <br>
        <input type="text" name="apellido" required> </input> <br>
        <br>    
    Introduce dni: <br>
        <input type="text" name="dni"> </input> <br>
        <br>   
     Introduce código postal: <br>
        <input type="text" name="codigoPostal" required> </input> <br>
        <br>
      Introduce direccion cliente: <br>
        <input type="text" name="dirección" required> </input> <br>
        <br>
      Introduce ciudad: <br>
        <input type="text" name="ciudad" required> </input> <br>
        <br>      
        <input type="submit" name="registro" value="REGISTRO">
    </form>


<?php 
    if (isset($_POST["registro"])) {
        include ("funcionesWeb.php");
        $conexion = crearConexionPDO();  
        $dniCliente = limpiar_campo($_POST['dni']);
        $nombreCliente = limpiar_campo($_POST['nombre']); 
        $apellidoCliente = limpiar_campo($_POST['apellido']);
        $codigoPostalCliente = limpiar_campo($_POST['codigoPostal']); 
        $direccionCliente = limpiar_campo($_POST['dirección']); 
        $ciudadCliente = limpiar_campo($_POST['ciudad']); 

            if (!empty($dniCliente) && comprobardni($dniCliente)) {
                AltaClienteDiez($dniCliente,$nombreCliente, $apellidoCliente,$codigoPostalCliente,$direccionCliente,$ciudadCliente,$conexion);
            }//fin if secundario
            else {
                echo "Introduce el dni en el formato correcto";
            }
    }//fin if principal

?>
</BODY>
</HTML>
