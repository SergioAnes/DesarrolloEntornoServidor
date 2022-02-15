<?php
  function test_input($data) {//Limpiamos los datos que nos pasan
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
  }

function abrirConexion() {
  $servername = "localhost";
  $username = "root";
  $password = "rootroot";
  $dbname = "movilmad";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }

  return $conn;
}//de function

  function cerrarConexión($conn) {
    $conn = null;//Cerramos la conexión
  }

  function nombreCliente($cliente,$conn) {//Le pasamos el email del cliente y devolvemos su nombre
  try {
    $stmt = $conn->prepare("SELECT nombre FROM rclientes WHERE idcliente = '$cliente'");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
      foreach($stmt->fetchAll() as $row) {
        $nombre = $row["nombre"];
     }
     return $nombre;
  }
  catch(PDOException $e) {
      echo "Error: ".$e->getMessage();
  }
  }

function consultaValor($base, $consulta){
        $resultado = $base->prepare($consulta);
        $resultado->execute();
        $valor=$resultado->fetchColumn(); //Si no se especifica nada, devuelve la primera columna de la primera fila.
        return $valor;
} // fin consultarValor

function consultar ($base, $consulta){ //base para cualquier consulta que se reciba por parámetro.
        $resultado = $base->prepare($consulta); //se prepara la consulta
        $resultado->execute(); //se ejecuta
        $registro=$resultado->fetchAll(PDO::FETCH_ASSOC); //se guardan los resultados de la consulta
        return $registro; //se retorna el registro.
    } // fin consultar.

function compruebaSiEsta ($base, $consulta) {
  $resultado = $base-> query($consulta);
  $EstaoNo=false;

  if($resultado->rowCount() > 0) { //Se supone que cuenta si el resultado de la consulta está en alguna de las filas. Si está es true (1).
       $EstaoNo=true;
  }
  return $EstaoNo;
}


function desplegableVehiculos ($base){
      $sqlConsulta = ("SELECT matricula, marca, modelo from rvehiculos WHERE disponible='S'");
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

function desplegableVehiculos2 ($base, $idcliente){
      $sqlConsulta = ("SELECT rvehiculos.matricula as matricula, rvehiculos.marca as marca, rvehiculos.modelo as modelo from rvehiculos, ralquileres WHERE rvehiculos.matricula=ralquileres.matricula AND ralquileres.idcliente='$idcliente' AND ralquileres.fecha_devolucion IS NULL");
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

function actualizarStock1 ($base, $carroCompra) { 
    //Insercion en la tabla almacena de los registros: 
foreach ($carroCompra as $matricula => $dias){
  $sqlConsulta = "UPDATE rvehiculos SET disponible='S' where matricula='$matricula'"; 
   try {
    $resultado = $base-> prepare($sqlConsulta); // Se prepara.
    $resultado->execute(); //Se ejecuta
  }catch(PDOException $e){
     echo "No se ha podido actualizar el stock de la compra", $e-> getMessage();
   }
}// fin foreach
}

function actualizarStock2 ($base, $carroCompra) { 
    //Insercion en la tabla almacena de los registros: 
foreach ($carroCompra as $matricula => $dias){
  $sqlConsulta = "UPDATE rvehiculos SET disponible='N' WHERE matricula='$matricula'"; 
   try {
    $resultado = $base-> prepare($sqlConsulta); // Se prepara.
    $resultado->execute(); //Se ejecuta
  }catch(PDOException $e){
     echo "No se ha podido actualizar el stock de la compra", $e-> getMessage();
   }
}// fin foreach

}// fin actualizarStock2


function actualizarVehiculos($base, $matricula) { 
    //Insercion en la tabla almacena de los registros: 
  $sqlConsulta = "UPDATE rvehiculos SET disponible='S' WHERE matricula='$matricula'"; 
   try {
    $resultado = $base-> prepare($sqlConsulta); // Se prepara.
    $resultado->execute(); //Se ejecuta
  }catch(PDOException $e){
     echo "No se ha podido actualizar el stock de la compra", $e-> getMessage();
   }
}// fin actualizarAlquileres

function actualizarAlquileres($base, $fechadevolucion, $preciototal, $matricula, $idcliente) { 
    //Insercion en la tabla almacena de los registros: 
  $sqlConsulta = "UPDATE ralquileres SET fecha_devolucion='$fechadevolucion', preciototal='$preciototal' WHERE matricula='$matricula' AND idcliente='$idcliente'"; 
   try {
    $resultado = $base-> prepare($sqlConsulta); // Se prepara.
    $resultado->execute(); //Se ejecuta
  }catch(PDOException $e){
     echo "No se ha podido actualizar el stock de la compra", $e-> getMessage();
   }
}// fin actualizarAlquileres

function actualizarSaldoClientes($base, $idcliente, $preciototal) { 
    //Insercion en la tabla almacena de los registros: 
  $sqlConsulta = "UPDATE rclientes SET saldo=saldo-$preciototal WHERE idcliente='$idcliente'"; 
   try {
    $resultado = $base-> prepare($sqlConsulta); // Se prepara.
    $resultado->execute(); //Se ejecuta
  }catch(PDOException $e){
     echo "No se ha podido actualizar el stock de la compra", $e-> getMessage();
   }
}// fin actualizarAlquileres

function insertarAlquileres ($idcliente, $matricula, $fechaAlquiler, $base) {
  $sqlConsulta = "INSERT INTO ralquileres (idcliente, matricula, fecha_alquiler) VALUES ('$idcliente', '$matricula', '$fechaAlquiler')"; 
   try {
    $resultado = $base-> prepare($sqlConsulta); // Se prepara.
    $resultado->execute(); //Se ejecuta. 
    echo "Datos insertados en la tabla <br>";
  }catch(PDOException $e){
     echo "No se han podido insertar los datos en la tabla  <br>", $e-> getMessage();
   }
}//fin insertarPayments 

function generarNuevaID ($base) {
    $sqlConsulta = ("SELECT max(InvoiceId) FROM invoice"); //los números de pedido (orders) van hasta el 10425, de uno en uno, por lo que hay que recuperar el número y añadirle uno.
    $resultado = $base->prepare($sqlConsulta);
        $resultado->execute();
        $valor=$resultado->fetchColumn(); //Si no se especifica nada, devuelve la primera columna de la primera fila. En este caso, un select con un único dato, devuelve la primera vez 10425.
        $valor++;
        return $valor;
}//fin generar orden.

function generarNuevaLine ($base) {
    $sqlConsulta = ("SELECT max(InvoiceLineId) FROM invoiceline"); //los números de pedido (orders) van hasta el 10425, de uno en uno, por lo que hay que recuperar el número y añadirle uno.
    $resultado = $base->prepare($sqlConsulta);
        $resultado->execute();
        $valor=$resultado->fetchColumn(); //Si no se especifica nada, devuelve la primera columna de la primera fila. En este caso, un select con un único dato, devuelve la primera vez 10425.
        $valor++;
        return $valor;
}//fin generar orden.

 ?>
