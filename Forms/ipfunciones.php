
<?php 


//Recepcion de parametros 
//En este caso la recepcion se hace en el php que incluye el include. 


//Limpieza del codigo
function limpiar_campo($variableRecogida) {
  $variableRecogida = trim($variableRecogida); //elimina espacios en blanco por izquierda/derecha
  $variableRecogida = stripslashes($variableRecogida); //elimina la barra de escape "\", utilizada para escapar caracteres
  $variableRecogida = htmlspecialchars($variableRecogida);  


  return $variableRecogida;
   
}


function conversionIp ($direccionIp) {

	$direccionIp=limpiar_campo($direccionIp); //limpiamos la variable. 
	$direccionIpSeparada = numeroPartes($direccionIp); //dividimos la variable en partes 

	//direcciones por partes
	$direccion1 = $direccionIpSeparada[0];
	$direccion2 = $direccionIpSeparada[1];
	$direccion3 = $direccionIpSeparada[2];
	$direccion4 = $direccionIpSeparada[3];

	//Ejemplo: $number = 98765; $length = 10; $string = substr(str_repeat(0, $length).$number, - $length);
	//añadir 0 si faltan

	//conversion a decimal
	$ipBinario1 = ponerCeros(convertirBinario($direccion1));
	$ipBinario2 = ponerCeros(convertirBinario($direccion2));
	$ipBinario3 = ponerCeros(convertirBinario($direccion3));
	$ipBinario4 = ponerCeros(convertirBinario($direccion4));


	//imprimimos por pantalla los resultados
	echo "Ip notacion decimal: " . $direccion1 . " . " . $direccion2 . " . " . $direccion3 .  " . " . $direccion4 . "  ";
	echo "Ip convertida a binario: " .  $ipBinario1 . " . " . $ipBinario2 . " . " . $ipBinario3 . " . " . $ipBinario4;

}
	

//logica del programa = funciones 

function numeroPartes ($cadenaNumero) { //dividimos el numero en partes. 

	$separador=".";
	$separado = explode($separador, $cadenaNumero);

	return $separado;

}

function convertirBinario ($direccion) { //convierte a binario. 

	$resultado = decbin($direccion);

	return $resultado;

}

function ponerCeros ($numero) { //completa con 0 a la izquierda si la longitud, que tiene que ser de 8, no lo es. 

	$length = 8;
	$parametro = substr(str_repeat(0, $length). $numero, - $length);

	return $parametro;

}


 ?>