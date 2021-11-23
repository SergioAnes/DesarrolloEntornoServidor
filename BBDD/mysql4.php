<?php
/*SELECTs - MySQLi procedural*/

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleados1n";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT nombre_d FROM departamento";
$result = mysqli_query($conn, $sql); //ese result es un array asociativo que tiene por clave el nombre de los campos. 

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { //se lee el array asociativo y va asociando el valor asociado a cada uno de los campos.
        echo "Nombre: " . $row["nombre_d"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

