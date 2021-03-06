<?php
    //1.- Se mira si hay o no una sesión abierta. 
    session_start();
    if (!isset($_SESSION["CustomerNumber"])) { //
      exit("No estas logeado");
    } else {
        echo "Bienvenido/a " . ($_SESSION['CustomerNumber']) . "<br><br>";
    }
    // Si el carrito no ha sido inicializando, lo creamos
    if (!isset($_SESSION['CARROCOMPRA'])) {
        $_SESSION['CARROCOMPRA'] = array();
        $carroCompra = $_SESSION['CARROCOMPRA']; //el contenido del array de carroCompra se pasa a la variable $carroCompra sobre la que se va a trabajar.
    } else {$carroCompra = $_SESSION['CARROCOMPRA'];}
?>

<HTML>
<HEAD> 
    <TITLE> EJERCICIO pe_altaped.php GRUPO SERGIOS</TITLE> 
    <style>
            tr{text-align: center;}
            td{width: 200px;}        
    </style>

</HEAD>
<BODY>
    <h1> ALTA PEDIDO </h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <?php

            include ("../funciones/funcionespe_altaped.php"); 
            $conexion = abrirConexion(); //Se establece la conexión. 
        ?>    

    <label> Lista de productos seleccionables <label>
        <select name="productCode">
            <?php
                $desplegableProductos= desplegableProductos($conexion); //Se despliegan los productos QUE TENGAN STOCK. 
                while ($fila=$desplegableProductos->fetch(PDO::FETCH_ASSOC)) {  
            ?>
                <option value="<?php echo $fila['productCode']?>"> <?php echo $fila['productName'] ?> </option>
            <?php
                } //fin while
             ?>   
        </select> <br>

        <p> <label> Selecciona la cantidad: </label>
            <input type='text' name='cantidad' placeholder='Cantidad'>
        </p>
            <input type="submit" value="Agregar a la Cesta"  name="agregar">
            <input type="submit" value="Vaciar Cesta" name="vaciar">
            <input type="submit" value="Ver Cesta"  name="verCesta">
            <br><br>
    </form>
       <?php 
        if($_POST){ 

            //recogida y limpieza de valores introducidos por el usuario.
            $codigoProducto = test_input($_POST['productCode']);
            $cantidadProducto = test_input($_POST['cantidad']);

            //Ahora hay que establecer las funciones para cada uno de los botones: 
            if (isset($_POST['agregar'])) { 

            //Si se pulsa agregar hay que comprobar que hay stock suficiente según el número de unidades que quiera el cliente de cada producto.
                $cantidadStock = consultaValor($conexion, "SELECT quantityInStock FROM products WHERE productCode = '$codigoProducto'"); 

                if ($cantidadStock>=$cantidadProducto) { //si la cantidad en stock es mayor o igual que las unidades del producto que se han pedido, entonces se agrega el producto al carro. 
                        if (!array_key_exists($codigoProducto, $carroCompra)) { //se comprueba si el código producto existe en el carro de la compra. 
                            $carroCompra[$codigoProducto]=$cantidadProducto; //Si el producto no estaba en el carro previamente, entonces se puede añadir. 
                            echo "Producto añadido correctamente";
                            var_dump($carroCompra); //variable de control por pantalla. 
                        }//fin if 
                            else {//Si el producto está en el carro de la compra, se avisa al usuario. 
                                echo "El artículo ya está en la cesta";
                            }//fin else
                   
                } else {
                    echo "No hay suficiente stock del artículo que has seleccionado";

                 }//fin else 
                $_SESSION['CARROCOMPRA'] = $carroCompra; //una vez que se ha añadido al array $carroCompra los productos, pasamos esos datos al array sesión para que se quede ahí guardado. 
            }// fin if agregar 
       
            if (isset($_POST['vaciar'])) {//Si se pulsa el botón vaciar. Se vuelve a los orígenes. 
                    $_SESSION['CARROCOMPRA'] = array(); //genera un nuevo array de cero. 
                    $carroCompra = $_SESSION['CARROCOMPRA']; 
            } //fin if vaciar

            //visualizar la cesta 
            if (isset($_POST["verCesta"])) { //Si se pulsa ver cesta, se visualiza la tabla. 
                echo "<br> <br> <table border='2'>";
                echo "<thead> <tr> <th colspan='3'> CARRO DE LA COMPRA </th> </tr> </thead>
                <tbody>
                <tr> <th> Nombre del producto </th> <th> Cantidad </th> <th> Precio </th> </tr>"; 
                foreach ($carroCompra as $codigoProducto => $cantidadProducto) {
                    $nombreProducto = consultaValor($conexion, "SELECT productName FROM products where productCode = '$codigoProducto'");
                    $precio = consultaValor($conexion, "SELECT buyPrice FROM products where productCode = '$codigoProducto'"); //se extrae el nombre del producto en base a la id. 
                    echo   "<tr>
                                <td>".$nombreProducto."</td>
                                <td>".$cantidadProducto."</td>
                                <td>".$precio."</td>
                            </tr>";
                }
                echo "</tbody></table>";
                echo "<br>";
            }

                $sumaCompra=0; //variable en la que se irán haciendo las sumas. 
                //También tienen que aparecer reflejadas las cantidades. Es decir, del array, tengo que acceder a cada una de las cantidades y hacer la suma por cantidades de cada producto. 
                foreach ($carroCompra as $codigoProducto => $cantidadProducto) {
                    $precioProducto = consultaValor($conexion, "SELECT buyPrice FROM products where productCode = '$codigoProducto'"); //Se devuelve el precio de cada producto
                    $precioConCantidades = $precioProducto * $cantidadProducto; //en cada pasada, se multiplica ese precio por la cantidad introducida. 
                    $sumaCompra+=$precioConCantidades; //se va acumulando el precio total en la variable $sumacompra.
                }

                echo "Cantidad total: " . $sumaCompra . "€";

                //Una vez hecho esto, queda: 1) Hacer la compra con el tema de las fechas. 2) Actualizar el stock 3) Todo esto SOLO ES POSIBLE si hay un checkNumber (un cheque en el que cargar la compra);
                //checkNumber con formato AA99999

        }//fin post        
        ?> 
                <br>
                <label> Introduce el checkNumber </label>
                <input type="text" name="checkNumber" placeholder="formato AA99999">
                <br><br>
                <input type="submit" name="comprar" value="Comprar">  
                <br>

        <?php       

            if (isset($_POST['comprar'])) { //Si se pulsa el botón de comprar: 
                $checkNumber = test_input($_POST['checkNumber']); // se recoge el cheque
                $expresionRegular = '/[A-Z]{2}[0-9]{5}/'; // Expresión regular para el checkNumber
                    $seRepite = false; //El checknumber es una clave primaria, por lo que no puede ser que esté repetido en la BBDD. Si no no se va a poder luego insertar nada.

                    if (preg_match($expresionRegular, $checkNumber)) { //Si el checkNumber cumple el formato, entonces hay dos opciones: o que esté bien o que esté repetido. 
                        //1) Se comprueba si está en la BBDD.
                                $cheques = consultar($conexion, "SELECT checknumber as cadaCheque FROM payments"); //devuelve todos los cheques de la base, pero para acceder a cada uno hay que recorrerlos en un array asociativo (FECTHALL). 
                                foreach ($cheques as $cheque) {
                                         if ($cheque['cadaCheque'] == $checkNumber) {
                                            $seRepite = true;
                                         } //¿El cheque introducido es igual que alguno que haya en la BBDD?
                                }//FIN foreach 
                        if ($seRepite) {
                            echo "El cheque está repetido y es una clave primaria. Y eso NO puede ser";
                        } else {//Si no se repite, entonces se inicia el proceso que engloba toda la compra. //INSERTAR DATOS Y ACTUALIZAR STOCK Y ACTUALIZAR PAYMENTS.
                            //echo $fechaActual = date('Y-m-d');
                            $CustomerNumber=$_SESSION['CustomerNumber'];
                            $paymentDate = date('Y-m-d');
                            //Se insertan los datos correspondientes en actualizar Payments. 
                            insertarPayments($CustomerNumber, $checkNumber, $paymentDate, $sumaCompra, $conexion); 
                            //se actualiza el stock //
                            actualizarStock2($conexion, $carroCompra);
                            //ahora toca actualizar el tema de la orden(pedido). Para eso, hay que crear una nueva orden. 
                            $nuevaorden = generarNuevaOrden($conexion); //la función coge el último número y le suma +1. Se parte del 10425.
                            insertarDatosOrders($nuevaorden, $paymentDate,$paymentDate,$CustomerNumber,$conexion);
                            //Se insertan: insertarDatosOrders ($orderNumber,$orderDate,$requiredDate,$customerNumber,$base);
                            
                            $orderLine = 1; //Entiendo que es el número de líneas del carrito de la compra. Si hay tres artículos diferentes, salen tres líneas para un número de orden generado en cada compra. 

                            // Ahora incluiremos los datos de la compra en la tabla orderDetails, producto por producto. 
                            foreach ($carroCompra as $codigoProducto => $cantidadProducto) {
                                // Aqui conseguimos el precio de cada producto
                                $precioProducto = consultar($conexion, "SELECT buyPrice as precio from products where productCode = '$codigoProducto'");
                                foreach ($precioProducto as $cadaProducto) {
                                    $priceEach = $cadaProducto['precio'];          
                                }
                                // Hacemos la inserción en la tabla orderdetails
                                $sqlConsulta = "INSERT INTO orderdetails values ('$nuevaorden', '$codigoProducto', '$cantidadProducto', '$priceEach', $orderLine)";
                                $conexion->exec($sqlConsulta);
                                $orderLine = $orderLine+1;
                            } //fin bucle foreach. //Mientras que haya productos en la cesta, hace la inserción. 
                            
                            echo "<br>";
                            echo "Compra correcta";

                            //Una vez se haga la compra, se debería reiniciar el carrito. 
                            $_SESSION['CARROCOMPRA'] = array(); 
                            $carroCompra = $_SESSION['CARROCOMPRA'];
                        }//FIN else
                     }//fin expresión regular 
                     else{
                        echo "El Check Number introducido es erróneo (Formato: AA99999)";
                      }    
            }//FIN IF COMPRAR
        
        ?>  

    <p><a href="pe_inicio.php">Volver al menu de usuario</a></p>
</BODY>
</HTML>