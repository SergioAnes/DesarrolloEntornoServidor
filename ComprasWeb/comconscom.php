<HTML>
<HEAD> 
    <TITLE> Ejercicio 7 comprasWeb </TITLE> 
</HEAD>
<BODY>
    <h1> Se mostrarán en un desplegable los NIF de los clientes, una fecha desde y una fecha hasta. Se mostrará por pantalla la información de las compras realizadas por los clientes en ese periodo (producto, nombre producto, precio compra) así como el montante total de todas las compras. </h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

        <?php
            include ("funcionesWeb.php"); //Se tiene que poner antes del html desplegable porque si no sale vacío. 
            $conexion = crearConexionPDO();
            $resultado=desplegableAlmacenes($conexion);
        ?>
    Lista desplegable de la localidad del almacén:
        <select name="num_almacen">
            <?php
            while ($fila=$resultado->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <option value="<?php echo $fila['num_almacen']?>"> <?php echo $fila['localidad'] ?> </option>
        <?php
            }
        ?>
        </select>     
         <br><br>
         <input type="submit" name="alta" value="COMPROBAR PRODUCTOS ALMACÉN">
    </form>

<?php 
    if (isset($_POST["alta"])) {
    $conexion = crearConexionPDO();  
    $num_Almacen = limpiar_campo($_POST['num_almacen']); 

    echo "<h2> EL STOCK PARA EL PRODUCTO SELECCIONADO ES: </h2>";
    $resultado2 = comprobarProductosAlmacen($num_Almacen, $conexion); 

    echo "<table border='1' bordercolor='black' align='left'>";
    echo "<th>" . "nombre" . "</th>" . "<th>" . "id_producto" . "</th>" . "<th>" . "precio" . "</th>" . "<th>" . "id_categoria" . "</th>" . "<th>" . "num_almacen" . "</th>" . "<th>" . "localidad" . "</th>"; 
    while ($fila=$resultado2->fetch(PDO::FETCH_ASSOC)) {

        echo "<tr>" . "<td>" . $fila['nombre'] . "</td>" . "<td>" . $fila['id_producto'] . "</td>" . "<td>" . $fila['precio'] . "</td>" . "<td>" . $fila['id_categoria'] . "</td>" . "<td>" . $fila['num_almacen'] . "</td>" . "<td>" . $fila['localidad'] .  "</td>" . "</tr>";
    }
    echo "</table>";
}

?>
</BODY>
</HTML>

