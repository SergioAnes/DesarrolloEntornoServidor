
<?php 


//variablesError
$fechaError= "";


//logica del programa
/*formulario que recoja los datos de alumnos y los almacene un fichero con nombre alumnos2.txt (una fila por alumno). Los campos del fichero estarán separados utilizando como caracteres delimitadores ##
Nombre##Apellido1##Apellido2##Fecha Nacimiento##Localidad
No se completarán con espacios los campos puesto que se separan por caracteres delimitadores. Se deberá comprobar que la fecha introducida es una fecha correcta..*/


if ($_SERVER["REQUEST_METHOD"] == "POST") {


//recogida y limpieza de variables QUITANDO LOS ESPACIOS PARA NO DESVIRTUAR LOS DELIMITADORES
$nombre = limpiar_campos($_POST["nombre"]);
$apellido1 = limpiar_campos($_POST["apellido1"]);
$apellido2 = limpiar_campos($_POST["apellido2"]);
$fnacimiento = limpiar_campos($_POST["fnacimiento"]);
$localidad = limpiar_campos($_POST["localidad"]);


if (fechaValidada($fnacimiento)) {

	$delimitador="##";

$recogidaDatos =  $nombre . $delimitador. $apellido1 . $delimitador . $apellido2 . $delimitador . $fnacimiento. $delimitador . $localidad . "\n";


//crear fichero
$nombreFichero = "alumnos2.txt";
$fichero = fopen($nombreFichero , "a");  //Apertura para sólo escritura; coloca el puntero del fichero al final del mismo. Si el fichero no existe, se intenta crear. En este modo, fseek() solamente afecta a la posición de lectura; las lecturas siempre son pospuestas.

//escribirlo
fwrite($fichero, $recogidaDatos);
//y cerrarlo
fclose($fichero);


//Ahora, apertura del fichero pero para leer. 
$fichero = fopen($nombreFichero , "r"); 
//lectura del fichero. Voy a probar con el tipico eof 

while (!feof($fichero)) { //mientras que no encuentre el final del archivo, lee las lineas que hay en el fichero. 

	$linea =  fgets($fichero);
	echo $linea. "<br>"; //ESTO NO SE IMPRIME EN EL FICHERO, SINO EN PANTALLA. LOS ECHO VAN SIEMPRE A PANTALLA. 
}
fclose($fichero);


} else {

	$fechaError  = "La fecha debe tener este formato dd/mm/aa";

}

}

//funciones
function limpiar_campos($variableRecogida) {
  $variableRecogida = trim($variableRecogida); //elimina espacios en blanco por izquierda/derecha
  $variableRecogida = stripslashes($variableRecogida); //elimina la barra de escape "\", utilizada para escapar caracteres
  $variableRecogida = htmlspecialchars($variableRecogida); 
  $variableRecogida= str_replace(" ", "",$variableRecogida); //eliminamos posibles espacios para que unicamente estén separados por los delimitadores.


  return $variableRecogida;
   
}

function fechaValidada ($fecha) {


	$fechacomprobada=true;
	$separador = "/";
	$fechaSeparada = explode($separador, $fecha);


	if (count($fechaSeparada)==3 && checkdate($fechaSeparada[1], $fechaSeparada[0], $fechaSeparada[2])) { //con el count se verifica que hay tres campos (dia/mes/año).
																										//el checkdate tiene formato mes/dia/año. Si el usuario de España mete dia, mes, año, la comprobacion hay que hacerla poniendo primero el mes, o sea, lo que en el array español ocuparía la posición 1.
		 $fechacomprobada=true;
 
	} else {
  
  		$fechacomprobada=false;
        
	}

		return $fechacomprobada;

}





 ?>