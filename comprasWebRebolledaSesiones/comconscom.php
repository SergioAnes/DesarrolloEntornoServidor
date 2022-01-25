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
            $resultado=desplegarDni($conexion);
        ?>
    Lista desplegable de los dni:
        <select name="nif">
            <?php
            while ($fila=$resultado->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <option value="<?php echo $fila['nif']?>"> <?php echo $fila['nif'] ?> </option>
        <?php
            }
        ?>
        </select><br><br>
        Fecha desde: <input type='date' name='fecha1' value=''><br> 
        Fecha hasta: <input type='date' name='fecha2' value=''><br>    
         <br><br>
         <input type="submit" name="alta" value="COMPROBAR COMPRAS CLIENTES">
    </form>

<?php 
    if (isset($_POST["alta"])) {
    $conexion = crearConexionPDO();  
    $nif = limpiar_campo($_POST['nif']);
    $fechaDesde = limpiar_campo($_POST['fecha1']); 
    $fechaHasta = limpiar_campo($_POST['fecha2']);  


    echo "<h2> Las compras realizadas por el cliente en las fechas seleccionadas son: </h2>";
    $resultado2 = comprasFecha($fechaDesde, $fechaHasta, $nif, $conexion); //llamada a la función de la consulta. 

    echo "<table border='1' bordercolor='black' align='left'>";//La consulta devuelve lo que se le solicita en el SELECT.
    echo "<th>" . "NIF" . "</th>" . "<th>" . "id_producto" . "</th>" . "<th>" . "nombre" . "</th>" . "<th>" . "precio" . "</th>" . "</th>"; 
    while ($fila=$resultado2->fetch(PDO::FETCH_ASSOC)) {

        echo "<tr>" . "<td>" . $fila['NIF'] . "</td>" . "<td>" . $fila['id_producto'] . "</td>" . "<td>" . $fila['nombre'] . "</td>" . "<td>" . $fila['precio'] . "</tr>";//Se imprimen los resultados del SELECT en PANTALLA. 
    }
    echo "</table>";
}

?>

<br /><a href="comlogincli2.php">Volver a pagina DOS</a>
</BODY>
</HTML>

