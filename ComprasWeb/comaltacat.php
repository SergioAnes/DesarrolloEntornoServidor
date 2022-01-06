<HTML>
<HEAD> 
    <TITLE> Probando BBDD </TITLE> 
</HEAD>
<BODY>
    <h1> ALTA CATEGORÍAS PRODUCTOS </h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

    Introduce CATEGORÍA: <br>
        <input type="text" name="categoria"> </input> <br>
            <br>
        <input type="submit" name="alta" value="enviar">
    </form>

<?php 
include ("funcionesWeb.php");

    if (isset($_POST["alta"])) {
    $conexion = crearConexionPDO(); //LLAMADA a la conexión. Devuelve la variable de conexión. 
    $nombreCategoria = limpiar_campo($_POST['categoria']); //Se limpian los campos de la categoría introducida por el usuario en el formulario.
    alta_categoria2($nombreCategoria, $conexion); //Se llama a la función y se le pasan dos parámetros: categoria introducida por el usuario y la conexión.
}

?>
</BODY>
</HTML>

