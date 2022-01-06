<HTML>
<HEAD> 
    <TITLE> Probando BBDD </TITLE> 
</HEAD>
<BODY>
    <h1> Dar de alta almacenes en diferentes localidades. El número de almacén será un número secuencial que comenzará en 10 y se incrementará de 10 en 10. </h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

    Introduce la localidad del almacen: <br>

        <input type="text" name="localidadAlmacen" required> </input> <br>
        <br>
        <input type="submit" name="alta" value="DAR DE ALTA">
    </form>

<?php 
    if (isset($_POST["alta"])) {
    include ("funcionesWeb.php");
    $conexion = crearConexionPDO();  
    $localidadAlmacen = limpiar_campo($_POST['localidadAlmacen']); 
    altaLocalidadAlmacen($localidadAlmacen, $conexion); 
}

?>
</BODY>
</HTML>

