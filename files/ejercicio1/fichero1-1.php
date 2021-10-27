

<?php 


//variablesError
$fechaError= "";


//logica del programa
/*Se pide recoja los datos de alumnos y los almacene un fichero con nombre alumnos1.txt (una fila por alumno). Los campos del fichero estarán separados por posiciones:
Nombre: posición 1 a 40
Apellido1: posición 41 a 81
Apellido2: posición 82 a 123
Fecha Nacimiento: posición 124 a 133
Localidad: posición 134 a 160
Las posiciones no ocupadas se completarán con espacios. Se deberá comprobar que la fecha introducida es una fecha correcta.*/



if ($_SERVER["REQUEST_METHOD"] == "POST") {


//recogida de variables
$nombre = ($_POST["nombre"]);
$apellido1 = ($_POST["apellido1"]);
$apellido2 = ($_POST["apellido2"]);
$fnacimiento = ($_POST["fnacimiento"]);
$localidad = ($_POST["localidad"]);

//limpieza de variables

$nombre = limpiar_campos($nombre);
$apellido1 = limpiar_campos($apellido1);
$apellido2 = limpiar_campos($apellido2);
$fnacimiento = limpiar_campos($fnacimiento);
$localidad = limpiar_campos($localidad);


if (fechaValidada($fnacimiento)) {


$recogidaDatos = substr(str_repeat(" ", 40) . $nombre, - 40) . " " . substr(str_repeat(" ", 40) . $apellido1, - 40) . " " .  substr(str_repeat(" ", 41) . $apellido2 , - 41) . 
" " . substr(str_repeat(" ", 10) . $fnacimiento, -10) . substr(str_repeat(" ", 26) . $localidad, - 26) . "\n";

 /*OTRA OPCIÓN: $length = 7;
				$string = "12345";
				echo str_pad($string,$length,"0", STR_PAD_LEFT);
				//output: 0012345

	//La funcion que he usado  hace algo así como: 
	//Imaginemos que el numero que recibe es 12. Pues con el repeat añade 00000000 y se concatena con el numero 12.
	//000000000012
	//Y luego le digo con el substr que me coja toda la cadena 0000000012 y que se quede solo con los ultimos 8 contando desde el final: 00000012 	*/


//crear fichero
$nombreFichero = "alumnos1.txt";
$fichero = fopen($nombreFichero , "a");  //Apertura para sólo escritura; coloca el puntero del fichero al final del mismo. Si el fichero no existe, se intenta crear. En este modo, fseek() solamente afecta a la posición de lectura; las lecturas siempre son pospuestas.

//escribirlo
fwrite($fichero, $recogidaDatos);
//y cerrarlo
fclose($fichero);


//Ahora, apertura del fichero pero para leer. 
$fichero = fopen($nombreFichero , "r"); 
//lectura del fichero
$lectura = fread($fichero, filesize($nombreFichero));
echo $lectura; //lo sacamos por pantalla
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


  return $variableRecogida;
   
}

function fechaValidada ($fecha) {


	$fechacomprobada=true;
	$separador = "/";
	$fechaSeparada = explode($separador, $fecha);


	if (count($fechaSeparada)==3 && checkdate($fechaSeparada[1], $fechaSeparada[0], $fechaSeparada[2])) { //con el count se verifica que hay tres campos (dia/mes/año).
																										//el checkdate tiene formato mes/dia/año. Si el usuario de España mete dia, mes año, la comprobacion hay que hacerla poniendo primero el mes, o sea, lo que en el array español ocupari ala posicion 1.
		 $fechacomprobada=true;
 
	} else {
  
  		$fechacomprobada=false;
        
	}

		return $fechacomprobada;

}





 ?>