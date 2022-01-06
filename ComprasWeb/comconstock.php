<HTML>
<HEAD> 
    <TITLE> Probando BBDD </TITLE> 
</HEAD>
<BODY>
    <h1> Productos en un desplegable y se mostrará la cantidad disponible del producto seleccionado en cada uno de los almacenes. </h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

        <?php
            include ("funcionesWeb.php"); //Se tiene que poner antes del html desplegable porque si no sale vacío. 
            $conexion = crearConexionPDO();
            $resultado= desplegableProductos($conexion); 
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
         <br><br>
         <input type="submit" name="alta" value="COMPROBAR DISPONIBILIDAD">
    </form>

<?php 
    if (isset($_POST["alta"])) {
    $conexion = crearConexionPDO();  
    $idProducto = limpiar_campo($_POST['id_producto']); //HAY QUE PONER SIEMPRE EL PARÁMETRO DEL VALOR, NO?

    echo "<h2> EL STOCK PARA EL PRODUCTO SELECCIONADO ES: </h2>";
    $resultado = comprobarStock($idProducto, $conexion); 

    echo "<table border='1' bordercolor='black' align='left'>";
    echo "<th>" . "producto" . "</th>" . "<th>" . "cantidad" . "</th>" . "<th>" . "localidad almacén" . "</th>"; 
    while ($fila=$resultado->fetch(PDO::FETCH_ASSOC)) {

        echo "<tr>" . "<td>" . $fila['nombre'] . "</td>" . "<td>" . $fila['cantidad'] . "</td>" . "<td>" . $fila['localidad'] . "</td>" . "</tr>";
    }
    echo "</table>";
}

?>
</BODY>
</HTML>

