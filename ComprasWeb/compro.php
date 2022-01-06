<HTML>
<HEAD> 
    <TITLE> Ejercicio 9 comprasWeb SergioAnes </TITLE> 
</HEAD>
<BODY>
    <h1> El cliente podrá realizar la compra de un solo producto siempre que haya disponibilidad del mismo. </h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

        <?php
            include ("funcionesWeb.php"); //Se tiene que poner antes del html desplegable porque si no sale vacío. 
            $conexion = crearConexionPDO();
            $resultado= desplegableProductos($conexion); 
        ?>

        INTRODUCE DNI: 
        <input type="text" name="dni" required> </input> <br>

        Productos disponibles:
        <select name="id_producto">
            <?php
            while ($fila=$resultado->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <option value="<?php echo $fila['id_producto']?>"> <?php echo $fila['nombre'] ?> </option>
        <?php
            }
        ?>
        </select> <br>
         INTRODUCE EL NÚMERO DE UNIDADES
        <input type="text" name="unidades" required> </input> 

        <br>
        <br>                 
        <input type="submit" name="alta" value="COMPRAR PRODUCTO">
    </form>

<?php 
    if (isset($_POST["alta"])) {
    $conexion = crearConexionPDO();  
    $dniCliente = limpiar_campo($_POST['dni']); 
    $idProducto = limpiar_campo($_POST['id_producto']);
    $unidadesAComprar = limpiar_campo($_POST['unidades']);
    $dniCorrecto= comprobarDNIRegistrado($dniCliente,$conexion);

    if ($dniCorrecto) {
        $unidadesDisponibles = comprobarStockProducto($idProducto, $unidadesAComprar,$conexion);
        if ($unidadesDisponibles) {
            echo "El producto seleccionado está disponible";
            //faltaria, si el dni es correcto y hay stock del producto seleccionado, insertar los datos en la compra y actualizar la cantidad del almacena. //E insertarlos por fecha
        }else {
            echo "El producto seleccionado no está disponible";
        } //fin else
    }else {
        echo "El dni introducido no está registrado en la base";
    }//fin else  
}//fin isset alta

?>
</BODY>
</HTML>

