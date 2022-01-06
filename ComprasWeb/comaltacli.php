<HTML>
<HEAD> 
    <TITLE> Ejercicio 8 DNI Sergio Anes</TITLE> 
</HEAD>
<BODY>
    <h1> Dar de alta un cliente. Se validará que el campo NIF no está vacío y que se compone de 8 dígitos más una letra. Además, se controlará mediante el correspondiente mensaje de error que no se dan de alta dos clientes con el mismo NIF. </h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

    Introduce dni: <br>
        <input type="text" name="dni"> </input> <br>
        <br>
     Introduce nombre: <br>
        <input type="text" name="nombre" required> </input> <br>
        <br>   
     Introduce apellido: <br>
        <input type="text" name="apellido" required> </input> <br>
        <br>    
     Introduce código postal: <br>
        <input type="text" name="codigoPostal" required> </input> <br>
        <br>
     Introduce dirección: <br>
        <input type="text" name="dirección" required> </input> <br>
        <br>
     Introduce ciudad: <br>
        <input type="text" name="ciudad" required> </input> <br>
        <br>          
        <input type="submit" name="alta" value="DAR DE ALTA">
    </form>

<?php 
    if (isset($_POST["alta"])) {
        include ("funcionesWeb.php");
        $conexion = crearConexionPDO();  
        $dniCliente = limpiar_campo($_POST['dni']);
        $nombreCliente = limpiar_campo($_POST['nombre']); 
        $apellidoCliente = limpiar_campo($_POST['apellido']);
        $codigoPostalCliente = limpiar_campo($_POST['codigoPostal']); 
        $direccionCliente = limpiar_campo($_POST['dirección']); 
        $ciudadCliente = limpiar_campo($_POST['ciudad']); 

            if (!empty($dniCliente) && comprobardni($dniCliente)) {
                AltaCliente($dniCliente,$nombreCliente, $apellidoCliente,$codigoPostalCliente,$direccionCliente,$ciudadCliente, $conexion);
            }//fin if secundario
            else {
                echo "Introduce el dni en el formato correcto";
            }
    }//fin if principal

?>
</BODY>
</HTML>

