<HTML>
<HEAD> 
    <TITLE> Probando BBDD </TITLE> 
</HEAD>
<BODY>
    <h1> Introducir producto y almacén en listas desplegables y cantidad </h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

        <?php
            include ("funcionesWeb.php"); //Se tiene que poner antes del html desplegable porque si no sale vacío. 
            $conexion = crearConexionPDO();
            $resultado= desplegableProductos($conexion); 
            $resultado2=desplegableAlmacenes($conexion);
        ?>
    Lista desplegable de producto:
        <select name="id_producto">
            <?php
            while ($fila=$resultado->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <option value="<?php echo $fila['id_producto']?>"> <?php echo $fila['nombre'] ?> </option>
        <?php
            }
        ?>
        </select>
        <br>
        Lista desplegable de la localidad del almacén:
        <select name="num_almacen">
            <?php
            while ($fila=$resultado2->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <option value="<?php echo $fila['num_almacen']?>"> <?php echo $fila['num_almacen'] ?> </option>
        <?php
            }
        ?>
        </select>
        <br>
        Cantidad 
        <input type="text" name="cantidad" required> </input> <br>
        <br>                 
        <input type="submit" name="alta" value="DAR DE ALTA">
    </form>

<?php 
    if (isset($_POST["alta"])) {
    $conexion = crearConexionPDO();  
    $idProducto = limpiar_campo($_POST['id_producto']); 
    $numeroAlmacen = limpiar_campo($_POST['num_almacen']);
    $cantidad = limpiar_campo($_POST['cantidad']);
    altaCantidadProducto($numeroAlmacen, $idProducto, $cantidad, $conexion); 
}

?>
</BODY>
</HTML>

