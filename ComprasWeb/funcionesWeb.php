<?php 

//LIMPIEZA DE CAMPOS
function limpiar_campo($campoformulario) {
  $campoformulario = trim($campoformulario); //elimina espacios en blanco por izquierda/derecha
  $campoformulario = stripslashes($campoformulario); //elimina la barra de escape "\", utilizada para escapar caracteres
  $campoformulario = htmlspecialchars($campoformulario);  
  return $campoformulario;
}//fin de la funcion limpiar

//CONEXION
function crearConexionPDO () { //conexion a la BBDD
	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname="comprasWeb";
	try {
		$base=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
		$base -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base -> exec("SET CHARACTER SET utf8");
	} catch (PDOException $e) {
		die ("Error: " . $e->  GetMessage());
	} 
	return $base;
}//fin de la funcion de crear conexion PDO 

//CIERRE CONEXION
function cerrarConexion($base){
    $base = null;
}

//INTENTO DE FUNCION QUE AL FINAL NO USO
function alta_categoria($nombre, $base) {
	//ESTA CREO QUE IBA Y VA SUMANDO BIEN DE UNO EN UNO. 
	$sqlConsulta = "SELECT max(id_categoria) FROM categoria";
	$resultado = $base-> prepare($sqlConsulta);
	$resultado->execute();
	$fila = $resultado->fetchAll(PDO::FETCH_ASSOC);
	 foreach ($fila as $key => $categoria) {
        foreach ($categoria as $value) {
          $fila=$value;
        }
      }
	$id = $fila[0]+1;
	print_r($id);

	$sqlConsulta2 = "INSERT INTO categoria VALUES ('$id', '$nombre')";
	$resultado2 = $base-> prepare($sqlConsulta2);
	$resultado2->execute();
} //fin funcion alta_categoria


//EJERCICIO 1
function alta_categoria2($nombre, $base) {
//ME FALTARÍA AÑADIRLE LOS TRY Y LOS CATCH. 
	$sqlConsulta = "SELECT max(id_categoria) AS maximo FROM categoria"; 
	$resultado = $base-> prepare($sqlConsulta);
	$resultado->execute();
	while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) { //devuelve un array indexado por los nombres de las columnas del conjunto de resultados.
          echo $registro['maximo']; //Me da el id maximo que tenga. Si tengo 9 registros en la tabla, imprime el id 9. Busca el resultado que le pido en la consulta. EJEMPLO: C-003. 
          $ultimoNumero=$registro['maximo']; //EJEMPLO: C-003.
          //Si ponia $registro['id_categoria'] no iba, porque realmente esa consulta no se está haciendo. Se está haciendo max(id_categoria); 
      }//ifn del while

     $longitud=strlen($ultimoNumero); //LONGITUD DE C-003: 5
     echo "<br>";
     echo $longitud;
     $ultimoNumero=substr($ultimoNumero,2,$longitud); //Cuando le añado al numero C-, entonces necesito, para luego sumar 1, extraer el numero del codigo. De ahí que sea necesario hacer un substr. substr(codigo, start, end); Es decir, empieza desde la posicion 2 y quedate con lo que ocupe el último numero del registro. //SELECCIONO DESDE 0 HASTA EL FINAL,ME QUEDO CON 003.
     echo "<br>";
     echo $ultimoNumero; //Si ultimo numero es 9, por ejemplo, 

     $codCategoria=$ultimoNumero+1; //Pues aqui suma +1 y se va a 10, por ejemplo. AL 003 SE LE SUMA 1, ME QUEDO CON UN 4.
     echo "<br>";
     echo $codCategoria;
     echo "<br>";

     $codCategoria=str_pad($codCategoria, 3, "0", STR_PAD_LEFT); //Y aquí le digo que me rellene por la izquierda el numero con 0 hasta que haya 3 digitos. Es decir, si el codigo de la categoria es 9, por ejemplo, pues rellena con 009. Si el codigo es 10, pues rellena con un 0, y quedaria 010. AL 4 LE AÑADO 2 00 A LA IZQUIERDA: ME QUEDO CON 004.
     echo $codCategoria;
     echo "<br>";
     echo "<br>"; 
     echo $codCategoria="C-".$codCategoria; //Aqui al numero se le concatena C- . ES DECIR, AL 004 LE AÑADO A LA IZQUIERDA EL C-, POR LO QUE QUEDA C-004.

	$sqlConsulta2 = "INSERT INTO categoria VALUES ('$codCategoria', '$nombre')"; //Y aquí se hace la insercion de valores en la tabla. 
	$resultado2 = $base-> prepare($sqlConsulta2); // Se prepara.
	$resultado2->execute(); //Se ejecuta. 
} //fin funcion alta_categoria

//EJERCICIO 2
function desplegableCategorias ($base){
      $sqlConsulta = "SELECT id_categoria, nombre FROM categoria";
      try{
        $resultado=$base->prepare($sqlConsulta);
        $resultado->execute();
    }catch(PDOException $e){
        echo "No se ha ejecutado el select <br>",$e->getMessage();
    }
  //Devuelvo los resultados
  return $resultado;
  cerrarConexion($base);
}

//EJERCICIO 2
function altaProductos($nombre, $precio, $idCategoria, $base) {
	//proceso de seleccion de la id de producto más alta para añadirle luego el +1 con el autoIncrement
	$sqlConsulta = "SELECT max(id_producto) AS maximo FROM producto"; 
	$resultado = $base-> prepare($sqlConsulta);
	$resultado->execute();
	while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) { 
          $ultimoNumero=$registro['maximo'];   
      }//fin del while

     $longitud=strlen($ultimoNumero); //P0001 
     $ultimoNumero=substr($ultimoNumero,1,$longitud); 
     $codProducto=$ultimoNumero+1; 
     $codProducto=str_pad($codProducto, 4, "0", STR_PAD_LEFT); 
     echo $codProducto="P".$codProducto; 

    //Insercion en la tabla producto de los registros: 
	$sqlConsulta2 = "INSERT INTO producto VALUES ('$codProducto', '$nombre', '$precio', '$idCategoria')"; 
	 try {
		$resultado2 = $base-> prepare($sqlConsulta2); // Se prepara.
		$resultado2->execute(); //Se ejecuta. 
	}catch(PDOException $e){
		 echo "No se ha podido dar de alta el producto", $e-> getMessage();
	 }
} //fin funcion alta_categoria

//EJERCICIO 3
function altaLocalidadAlmacen ($nombre, $base) {

	//proceso de consulta: seleccionar almacen de la tabla donde el almacen sea el introdducido por el usuario. 
	$sqlConsulta="SELECT localidad FROM almacen WHERE localidad='$nombre'"; 
	$resultado = $base-> query($sqlConsulta);

	if($resultado->rowCount() > 0) { //Se supone que cuenta si el resultado de la consulta está en alguna de las filas. Si está es true (1).
		echo "La localidad ya está registrada";
	}
	else {
		$sqlConsulta2 = "SELECT max(num_almacen) AS maximo FROM almacen"; 
		$resultado2 = $base-> prepare($sqlConsulta2);
		$resultado2->execute();
		while ($registro = $resultado2->fetch(PDO::FETCH_ASSOC)) { 
          $ultimoNumero=$registro['maximo'];   
      }//fin del while

     	$codAlmacen=$ultimoNumero+10; //Que seleccione el maximo y a ese maximo le añada 10 antes de insertar.

     	//Insercion con la preparación de la consulta y con su ejecución. 
		$sqlConsulta3 = "INSERT INTO almacen VALUES ('$codAlmacen', '$nombre')";
		$resultado3 = $base-> prepare($sqlConsulta3); 
		$resultado3->execute(); 
	}
}//fin altaLocalidadAlmacen


//EJERCICIO 4
function desplegableProductos ($base){
      $sqlConsulta = "SELECT id_producto, nombre FROM producto";
      try{
        $resultado=$base->prepare($sqlConsulta);
        $resultado->execute();
    }catch(PDOException $e){
        echo "No se ha ejecutado el select <br>",$e->getMessage();
    }
  //Devuelvo los resultados
  return $resultado;
  cerrarConexion($base);
}

//EJERCICIO 4
function desplegableAlmacenes ($base){
      $sqlConsulta = "SELECT num_almacen, localidad FROM almacen";
      try{
        $resultado=$base->prepare($sqlConsulta);
        $resultado->execute();
    }catch(PDOException $e){
        echo "No se ha ejecutado el select <br>",$e->getMessage();
    }
  //Devuelvo los resultados
  return $resultado;
  cerrarConexion($base);
}

//EJERCICIO 4
function altaCantidadProducto ($num_almacen, $id_producto, $cantidad, $base) {
    //Insercion en la tabla almacena de los registros: 
	$sqlConsulta = "INSERT INTO almacena VALUES ('$num_almacen', '$id_producto', '$cantidad')"; 
	 try {
		$resultado = $base-> prepare($sqlConsulta); // Se prepara.
		$resultado->execute(); //Se ejecuta. 
		echo "Insercion hecha correctamente";
	}catch(PDOException $e){
		 echo "No se ha podido dar de alta el producto", $e-> getMessage();
	 }
} //fin funcion alta_categoria

//EJERCICIO5

function comprobarStock ($idProducto, $base) {
	$sqlConsulta = "SELECT producto.nombre, almacena.cantidad, almacen.localidad FROM producto, almacena, almacen WHERE almacena.id_producto = producto.id_producto AND almacena.num_almacen=almacen.num_almacen AND producto.id_producto='$idProducto';"; 
	$resultado = $base-> prepare($sqlConsulta);
	$resultado->execute();

	return $resultado;
}


//EJERCICIO6

function comprobarProductosAlmacen($num_Almacen, $base) {

	$sqlConsulta = "SELECT producto.nombre, producto.id_producto, producto.precio, producto.id_categoria, almacen.num_almacen, almacen.localidad FROM producto, almacena, almacen WHERE almacena.id_producto = producto.id_producto AND almacena.num_almacen=almacen.num_almacen AND almacen.num_almacen ='$num_Almacen';"; 
	$resultado = $base-> prepare($sqlConsulta);
	$resultado->execute();

	return $resultado;		
}


//EJERCICIO8
function comprobardni ($dni) {
	$letraControl = strtoupper(substr($dni, -1)); //Si meto 50556234A, aquí selecciono la A //strtoupper lo pasa a mayúscula 

	$numerosdni = substr($dni, 0, -1); //Se selecciona desde el 0 hasta el -1 (sin incluir el último). es decir, 50556234
	$esDni; 
	if (substr("TRWAGMYFPDXBNJZSQVHLCKE", intval($numerosdni%23), 1) == $letraControl && strlen($letraControl) == 1 && strlen ($numerosdni) == 8 ){
		$esDni=true;
	} 
	else {
	 $esDni=false;
	}
	return $esDni;
}//fin dni

//EJERCICIO8
function AltaCliente ($dniCliente, $nombreCliente, $apellidoCliente, $codigoPostalCliente, $direccionCliente, $ciudadCliente, $base) {

	//proceso de consulta: recorre los dni de la tabla y comprueba si está ya el que se ha introducido (no se puede repetir); 
	$sqlConsulta2="SELECT nif FROM cliente WHERE nif='$dniCliente'"; 
	$resultado2 = $base-> query($sqlConsulta2);

	if($resultado2->rowCount() > 0) { //Se supone que cuenta si el resultado de la consulta está en alguna de las filas. Si está es true (1).
		echo "El dni ya está registrado";
	}
	else {
	 //Insercion en la tabla almacena de los registros: 
	 $sqlConsulta = "INSERT INTO cliente VALUES ('$dniCliente', '$nombreCliente', '$apellidoCliente', '$codigoPostalCliente', '$direccionCliente', '$ciudadCliente')"; 
	 try {
		$resultado = $base-> prepare($sqlConsulta); // Se prepara.
		$resultado->execute(); //Se ejecuta. 
		echo "Insercion hecha correctamente";
	}catch(PDOException $e){
		 echo "No se ha podido dar de alta el producto", $e-> getMessage();
	 }

	}

}//fin funcion insertarAltaCliente


//EJERCICIO9

function comprobarDNIRegistrado($dniCliente,$base) {

	$sqlConsulta2="SELECT nif FROM cliente WHERE nif='$dniCliente'"; 
	$resultado2 = $base-> query($sqlConsulta2);
	$dniCorrecto;
	if($resultado2->rowCount() > 0) { //Se supone que cuenta si el resultado de la consulta está en alguna de las filas. Si está es true (1).
		$dniCorrecto=true;
	}else{
		$dniCorrecto=false;
	}
		return $dniCorrecto;

}//fin comprobaDNIRegistrado

//EJERCICIO9
function comprobarStockProducto($idProducto, $unidadesAComprar,$base){

		$sqlConsulta2 = "SELECT sum(almacena.cantidad) as sumaCantidades FROM producto INNER JOIN almacena ON producto.id_producto=almacena.id_producto WHERE producto.id_producto='$idProducto' GROUP BY producto.id_producto HAVING sumaCantidades>= '$unidadesAComprar'"; 
		$resultado2 = $base-> prepare($sqlConsulta2);
		$resultado2->execute();
		$unidadesDisponibles=0;
		if ($resultado2) {
			while ($registro = $resultado2->fetch(PDO::FETCH_ASSOC)) { 
            $unidadesDisponibles=$registro['sumaCantidades'];   
      		}//fin del while
        } else {
      		$unidadesDisponibles=0;
      	}
      return $unidadesDisponibles;
}//fin comprobarStockProducto

/*function actualizarStock ($idProducto, $unidadesAComprar, $base) {
	//Esta consulta creo que tampoco tendría sentido porque no me interesa tanto el número máximo de unidades de un producto como a qué almacén le resto el stock de ese producto. Se lo podría quitar al que más unidades tenga, pero no sé si es lo que pide. 
	$sqlConsulta = "SELECT SUM(almacena.cantidad) AS suma FROM almacena WHERE id_producto='$idProducto'"; 
		$resultado = $base-> prepare($sqlConsulta);
		$resultado->execute(); //aquí me devuelve por ejemplo 50, que el stock de ds que tengo
		while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) { 
            $unidadesDisponibles=$registro['suma'];   
      		}//fin del while

      	//la Nintento DS está en dos alamacenes, uno tiene 20 y otro 30. Ahora bien, cuando se hace la compra, a qué almacén le quito el stock? 
}//fin funcion actualizarStock*/


function insertarCompras ($nif, $id_producto, $unidades, $base) {
    //Insercion en la tabla almacena de los registros: 
    $now=date("Y/m/d");
	$sqlConsulta = "INSERT INTO compra VALUES ('$nif, '$id_producto', $now, '$unidades')"; 
	 try {
		$resultado = $base-> prepare($sqlConsulta); // Se prepara.
		$resultado->execute(); //Se ejecuta. 
		echo "Insercion hecha correctamente";
	}catch(PDOException $e){
		 echo "No se ha podido insertar la compra", $e-> getMessage();
	 }
} //fin funcion alta_categoria

function actualizarStock ($nif, $id_producto, $unidades, $base) {
    //Insercion en la tabla almacena de los registros: 
	/*A qué almacen se lo quito? */
	$sqlConsulta = "UPDATE almacena SET cantidad = cantidad - '$unidades' WHERE id_producto = '$id_producto'"; 
	 try {
		$resultado = $base-> prepare($sqlConsulta); // Se prepara.
		$resultado->execute(); //Se ejecuta. 
		echo "Actualización correcta";
	}catch(PDOException $e){
		 echo "No se ha podido actualizar el stock de la compra", $e-> getMessage();
	 }
} //fin funcion alta_categoria


//Ejercicio7 

function desplegarDni ($base){
      $sqlConsulta = "SELECT nif FROM cliente";
      try{
        $resultado=$base->prepare($sqlConsulta);
        $resultado->execute();
    }catch(PDOException $e){
        echo "No se ha ejecutado el select <br>",$e->getMessage();
    }
  //Devuelvo los resultados
  return $resultado;
  cerrarConexion($base);
}

//Ejercicio7 
function comprasFecha($fechaDesde, $fechaHasta, $NIF, $base){

		$sqlConsulta = "SELECT cliente.NIF, producto.id_producto, producto.nombre, producto.precio FROM cliente, producto, compra WHERE producto.id_producto=compra.id_producto AND cliente.nif=compra.nif AND compra.fecha_compra BETWEEN '$fechaDesde' AND '$fechaHasta' AND cliente.nif='$NIF'"; 
		$resultado = $base-> prepare($sqlConsulta);
		$resultado->execute();
		
      return $resultado;
}//fin comprobarStockProducto

//Ejercicio 10 
function AltaClienteDiez ($dniCliente, $nombreCliente, $apellidoCliente, $codigoPostalCliente, $direccionCliente, $ciudadCliente, $base) {

	$clave = strrev($apellidoCliente);

	//proceso de consulta: recorre los dni de la tabla y comprueba si está ya el que se ha introducido (no se puede repetir); 
	$sqlConsulta2="SELECT nif FROM cliente WHERE nif='$dniCliente'"; 
	$resultado2 = $base-> query($sqlConsulta2);

	if($resultado2->rowCount() > 0) { //Se supone que cuenta si el resultado de la consulta está en alguna de las filas. Si está es true (1).
		echo "El dni ya está registrado";
	}
	else {
	 //Insercion en la tabla almacena de los registros: 
	 $sqlConsulta = "INSERT INTO cliente VALUES ('$dniCliente', '$nombreCliente', '$apellidoCliente', '$codigoPostalCliente', '$direccionCliente', '$ciudadCliente', '$clave')"; 
	 try {
		$resultado = $base-> prepare($sqlConsulta); // Se prepara.
		$resultado->execute(); //Se ejecuta. 
		echo "Insercion hecha correctamente";
	}catch(PDOException $e){
		 echo "No se ha podido dar de alta el producto", $e-> getMessage();
	 }

	}

}//fin funcion insertarAltaCliente




//EJERCICIO 11 COMPROBAR NIF Y CONTRASEÑA para que deje hacer login 
function comprobarDNIRegistrado2($dniCliente,$base) {

	$sqlConsulta2="SELECT nif FROM cliente WHERE nif='$dniCliente'"; 
	$resultado2 = $base-> query($sqlConsulta2);
	$dniCorrecto;
	if($resultado2->rowCount() > 0) { //Se supone que cuenta si el resultado de la consulta está en alguna de las filas. Si está es true (1).
		$dniCorrecto=true;
	}else{
		$dniCorrecto=false;
	}
		return $dniCorrecto;

}//fin comprobaDNIRegistrado

function comprobarContraseñaDNI($dniCliente,$base) {

	$sqlConsulta2="SELECT clave FROM cliente WHERE nif='$dniCliente'"; 
	$resultado2 = $base-> query($sqlConsulta2);
	$claveCorrecta;
	while ($registro = $resultado2->fetch(PDO::FETCH_ASSOC)) { 
          $claveCliente=$registro['clave'];   
      }//fin del while

      return $claveCliente; 
}//fin comprobaDNIRegistrado



?>
