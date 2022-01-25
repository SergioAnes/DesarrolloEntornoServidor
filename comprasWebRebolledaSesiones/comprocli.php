<HTML>
<HEAD> 
    <TITLE> EJERCICIO 12 </TITLE> 
</HEAD>
<BODY>
    <h1> COMPRAS WEB </h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <?php
            session_start(); //Se supone que tiene que estar en el inicio porque la sesión ya está abierta tras haber hecho el login. 
            include ("funcionesWeb.php"); //Se tiene que poner antes del html desplegable porque si no sale vacío. 
            $conexion = crearConexionPDO();
            $resultadoProductos= desplegableProductos($conexion); 

            if(!isset($_SESSION['CARROCOMPRA'])) {//En caso de que no este creado el carro de la compra creamos la variable de sesión
                $_SESSION['CARROCOMPRA'] = array(); //la sesión del carro de la compra es un array. 
                $carroCompra = $_SESSION['CARROCOMPRA']; //el contenido del array de carroCompra se pasa a la variable $carroCompra sobre la que se va a trabajar. 
            }
            else {$carroCompra = $_SESSION['CARROCOMPRA'];}
        ?>    
    <br><br>

    <?php  
    if(!isset($_SESSION['usuarioNombre'])) { 
        echo "Hay que hacer login en el ejercicio anterior";
    }
    else { 
        echo "Bienvenido/a " . ($_SESSION['usuarioNombre']) . "<br><br>";
    ?>
    Lista desplegable de producto: 
        <select name="id_producto">
            <?php
            while ($fila=$resultadoProductos->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <option value="<?php echo $fila['id_producto']?>"> <?php echo $fila['nombre'] ?> </option> 
        <?php
            }
        ?>   
        </select>     
         <br>
        <p>Selecciona la cantidad:
        <input type='text' name='cantidad' placeholder='Cantidad'>
        </p>
       <input type="submit" value="Agregar a la Cesta"  name="agregar">
       <input type="submit" value="Ver la Cesta"  name="verCesta">
       <input type="submit" value="Vaciar Cesta" name="vaciar">
       <input type="submit" value="Comprar productos cesta" name="comprar">
    </form>
    <?php
        } //fin else 
    ?>

    <?php
         if($_POST) { //¿($_SERVER['REQUEST_METHOD'] == 'POST') en lugar de if ($_POST)? //Si se le da a algún botón, entra aquí. 

          //recepción y limpieza de parámetros.
          $cliente =  $_SESSION['usuarioNombre']; //generado en el ejercicio anterior. La sesión todavía está creada y aquí se recupera. 
          $idProducto = limpiar_campo($_POST['id_producto']); //Se extrae el idProducto del select (desplegable) de la parte superior.
          $cantidad = limpiar_campo($_POST['cantidad']); //Se extrae la cantidad de lo que introduce el usuario en el formulario. 
          $dni = $_SESSION['usuarioDNI']; //generado en el ejercicio anterior. La sesión todavía está creada y aquí se recupera. 
      
          if (isset($_POST["agregar"])) { //Si se pulsa el botón de agregar. Tiene que añadir productos a la cesta. 

            if (!array_key_exists($idProducto, $carroCompra)) {//Al usar un array asociativo, hay que usar key_exists, que comprueba si está la clave en el array. 
                $carroCompra[$idProducto] = $cantidad; //Array asociativo. Se agrega en el carro de la compra una cantidad que está asociada a una idProducto.
                //Si el array fuese indexado, se diría: $carroCompra[0]=$cantidad; es decir, que en la primera posición se introduzca $cantidad.
                //Al ser asociativo, el índice no es [0], sino el $idProducto que sea. Y luego se recuperan valores con el foreach ($carroCompra as $idProducto => $cantidad);
                echo "CESTA DE LA COMPRA <br>";
                echo "Producto <b>". obtenerNombreProducto($idProducto,$conexion)."</b> agregado";
                var_dump($carroCompra);
            }//fin if 
            else {//Si el producto está en el carro de la compra, se avisa al usuario. 
                echo "El artículo ya está en la cesta";
            }//fin else
            $_SESSION['CARROCOMPRA'] = $carroCompra; //una vez que se ha añadido al array $carroCompra los productos, pasamos esos datos al array sesión para que se quede ahí guardado. 
         }//fin if

          if (isset($_POST["verCesta"])) {
            echo "CESTA DE LA COMPRA <br>";
            mostrarProductosCesta2($carroCompra,$conexion);
          }//fin ver cesta 

           if (isset($_POST["vaciar"])) { //con el unset no iba porque no vuelve a poner en orden los índices.
                $longitudCarrito=count($carroCompra);
                array_splice($carroCompra, 0, $longitudCarrito);
             $_SESSION['CARROCOMPRA'] = $carroCompra;
            echo "Has vaciado toda la cesta. Estamos configurando la página para que puedas quitar solo un producto";
          }//fin ver cesta 

          if (isset($_POST["comprar"])) {
            //comprobar disponibilidad de productos. 
            if (comprobarStockProducto2($carroCompra,$cantidad,$conexion)==0) { //Si me devuelve cero es porque no hay stock de algún producto. 
              echo "No se puede realizar la compra porque faltan unidades del producto: <br>";
            } else {
                echo "Enhorabuena, porque parece que hay unidades disponibles de todos los productos <br>";
                //se insertan los datos: 
                insertarCompras2($dni, $carroCompra, $conexion);
                //hay que actualizar el stock en el almacen. 
                actualizarStock2($conexion, $carroCompra);
                //hay que vaciar el carrito.
                $longitudCarrito=count($carroCompra);
                array_splice($carroCompra, 0, $longitudCarrito);
                $_SESSION['CARROCOMPRA'] = $carroCompra;
            }
          }//fin boton comprar.
        } //fin post inicial.  
     ?>
</BODY>
</HTML>
