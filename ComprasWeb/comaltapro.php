<HTML>
<HEAD> 
    <TITLE> Probando BBDD </TITLE> 
</HEAD>
<BODY>
    <h1> DAR DE ALTA PRODUCTO EN UNA CATEGORÍA DESPLEGABLE: </h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

        <?php
            include ("funcionesWeb.php"); //Se tiene que poner antes del html desplegable porque si no sale vacío. 
            $conexion = crearConexionPDO();
            $resultado= desplegableCategorias($conexion); 
        ?>

    Nombre: <br>
        <input type="text" name="nombre" required> </input> <br>
        <br>
    Precio: <br>
        <input type="text" name="precio" required> </input> <br>
        <br>
    ID_CATEGORÍA:
        <select name="id_categoria">
            <?php
            while ($fila=$resultado->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <option value="<?php echo $fila['id_categoria']?>"> <?php echo $fila['nombre'] ?> </option>
        <?php
            }
        ?>
        </select>
        <br><br>                     
        <input type="submit" name="alta" value="DAR DE ALTA">
    </form>

<?php 
    if (isset($_POST["alta"])) {
    $conexion = crearConexionPDO();  
    $nombreProducto = limpiar_campo($_POST['nombre']); 
    $precioProducto = limpiar_campo($_POST['precio']);
    $idCategoria = limpiar_campo($_POST['id_categoria']);
    altaProductos($nombreProducto, $precioProducto, $idCategoria, $conexion); 
}

?>
</BODY>
</HTML>

