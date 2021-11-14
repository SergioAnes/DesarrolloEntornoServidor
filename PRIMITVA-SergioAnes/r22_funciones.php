
<?php 

	//SergioAnes
	//Se genera un BOMBO de 49 numeros. 
function numerosGanadores() {
	$bombo=range(1,49);
	//Se DESORDENA el bombo, para que los numeros no estén en plan 1,2,3,4,5,6,7...
	shuffle($bombo);
	//Ahora habría que CREAR un jugador ARRAY GANADOR que saca 7 números: 6+1 complementario.
	//Es decir, habria que generar un array con seis numeros y luego en la ultima posicion el reintegro, que tiene que ser de 0-9.  
	$numerosGanadores=array(); 
	for ($i=0; $i<7; $i++){
		$numerosGanadores[$i]=$bombo[$i];
	}//final bucle for. 
	//Ahora faltaría añadirle un número del 0-9 en el reintegro. Ocupará la posición 7 en el array. Se podría meter con un array push. 
	$reintegro=rand(0,9);
	array_push($numerosGanadores, $reintegro);
	//El COMPLEMENTARIO es la posicion 6 y la posicion 7 es del REINTEGRO. 
//Mostramos por pantalla los números para ver qué sale
//var_dump($numerosGanadores);
return $numerosGanadores;
}//fin funcion numeros ganadores. 

//Ahora supongo que hay que comparar la jugada del jugador con los elemtnos del fichero (donde aparecen las combinacioens posibles).
// Y eso habrá que leerlo e ir comparando línea por línea.  

function jugarPrimitiva ($numerosGanadores) {
$aciertosCategorias = array(0,0,0,0,0,0,0,0,0);     //Posicion 0: ¿cuántos han tenido 0 aciertos? 1
													//posicion 1: ¿cuántos han tenido 1 aciertos? 2
													//posicion 2: ¿cuántos han tenido 2 aciertos? 3
													//posicion 3: ¿cuántos han tenido 3 aciertos? 4 
													//posicion 4: ¿cuántos han tenido 4 aciertos? 5
													//posicion 5: ¿cuántos han tenido 5 aciertos? 6
													//posicion 6: ¿cuántos han tenido 6 aciertos? 7
													//posicion 7: ¿cuántos han tenido 5 aciertos + COMPLEMENTARIO? 8
													//posicion 8: ¿cuántos han acertado los REINTEGROS? ESTO CREO QUE VA INDEPENDIENTE DE TODO LO DEMÁS. 9

//Y ahora, de momento, habrá que abrir el fichero Y EVALUAR EL NÚMERO DE ACIERTOS. 
//Posibles ficheros. 
$fichero1="r22_primitiva.txt";
$fichero2="r22_primitiva2.txt";
//Lectura de ficheros con delimitador. HACIENDO PRUEBAS.  //Si existe, guay. 
	$lecturaFichero=fopen($fichero1,"r"); 
	fgets($lecturaFichero); //La primera línea no interesa nada. Con el fgets se posiciona el puntero al final de esa línea. 	
	while (!feof($lecturaFichero)) { //Mientras no se llegue al final del archivo: hay que leer línea a línea. 
		$linea=fgets($lecturaFichero); //ve leyendo línea a línea. 
		$lineaSeparada = sacaLineaFichero($linea); //Se separan los números delimitados por "-";
		$numeroAciertos = compararNumeros($numerosGanadores,$lineaSeparada); //Se comparan los números y se obtiene el número de aciertos. 
		//Ahora tocaría ir sumando los aciertos al array aciertosCategorias: 
			if ($numeroAciertos!=5 && comprobarReintegro($numerosGanadores, $lineaSeparada)==false) { //Las excepciones están en si el numero es 5 y en si se acierta el reintegro. Si el número no es 5 y el reintegro es falso, entonces se le suma +1 a la posicion que ocupa en numero de aciertos en $aciertosCategorias.
				$aciertosCategorias[$numeroAciertos]++;
			}
			else { //Si entra aquí es porque: EL NUMERO ES 5 O REINTEGRO ES TRUE. ENTONCES: 
				if ($numeroAciertos==5 && cincoyComplementario($numerosGanadores, $lineaSeparada)==true) { 
					$aciertosCategorias[7]++;	//si el numero de aciertos es 5 y el complementario se ha acertado,el +1 va a la posicion7;
				}//final if 
				if (comprobarReintegro($numerosGanadores, $lineaSeparada)==true) {
					$aciertosCategorias[8]++; //Y si no se da la condición anterior, entra en esta: Entonces comprueba si Reintegro es verdad.
				}//final if
				else {//Si EL NUMERO 5 y el complementario es false, Y SI REINTEGRO ES FALSO, ENTONCES ENTRA AQUÍ. 
					$aciertosCategorias[5]++;
				}//fin else
			}//fin else principal
	}//FINAL WHILE HASTA EL FINAL DEL ARCHIVO 
fclose($lecturaFichero);	
//COMPROBACIÓN DE LOS ACIERTOS POR CATEGORÍA. 
var_dump($aciertosCategorias); //IMPRIME EL ARRAY DE GANADORES. 
return $aciertosCategorias;
}//fin de la funcion JugarPrimitiva. 

//echo $numerosGanadores[1];
//echo "<br>";
//echo $lineaSeparada[1];

  //funcion para sacar una linea del fichero con los delimitadores 
  function sacaLineaFichero($linea){ //En el ejercicio se pide hacer una lectura del fichero 2, que es un fichero separado por DELIMITADORES. (el primero está separado por posiciones). 
  	$lineaSinId=substr($linea, 6); //el identificador siempre son las primeras seis letras, así que me lo quito de encima.
    $lineaDividida=explode('-',$lineaSinId); //con el Explode establecemos el delimitador. Cada línea se convierte en un array que se divide en posiciones por cada delimitador que encuentra. 
    //var_dump($lineaDividida); YA HE COMPROBADO QUE IMPRIME TODAS LAS LÍNEAS DEL FICHERO. 
    return $lineaDividida;
  }//final funcion 
//FUNCIÓN PARA COMPARAR LOS NÚMEROS Y EVALUAR EL NÚMERO DE ACIERTOS. DEVUELVE NUMERO DE ACIERTOS.
  function compararNumeros ($numerosGanadores, $linea) {
  	$contadorNumeros=0;
  	$longitud=count($numerosGanadores);
  	for ($i=0; $i<$longitud-2; $i++){ //habrá que evaluar los aciertos de los 6 primeros numeros (array longitud de 7-2=5, es decir, seis primeoros números: 0,1,2,3,4,5, hace 6 pasadas). El complementario y el reintegro van aparte. Se irán comparando luego, poco a poco. 
  		if ($numerosGanadores[$i]==$linea[$i]) {
  			$contadorNumeros++;
  		}//final if
    }//final for
   return $contadorNumeros;
  }//final funcion compararNumeros
//FUNCION PARA EVALUAR SI SE DA LA CIRCUNSTANCIA O NO DE 5 ACIERTOS MÁS ACIERTO DEL COMPLEMENTARIO. DEVUELVE VERDADERO O FALSO.
  function cincoyComplementario ($numerosGanadores, $linea) {
  	$coinciden=true;
  	$posicionComplementario=6;
  	if ($numerosGanadores[$posicionComplementario]!=$linea[$posicionComplementario]) {
  		$coinciden=false;
  	}//final if
  	return $coinciden;
  }///final funcion cincoyComplementario
//FUNCION PARA EVALUAR SI EL REINTEGRO SE HA ACERTADO O NO. DEVUELVE VERDADERO O FALSO.
  function comprobarReintegro ($numerosGanadores, $linea){ 
  	$reintegro=true;
  	$posicionReintegro=7;
  	if ($numerosGanadores[$posicionReintegro]!=$linea[$posicionReintegro]) {
  		$reintegro=false;
  	}//final if
  	return $reintegro;
  }//final comprobarReintegro 

 //UNA VEZ HECHO TODO LO ANTERIOR QUEDA: ESCRIBIR FICHERO Y SACAR TODO POR PANTALLA. 


function crearFichero($ganadores) {

$ficheroPremios = fopen("premiosPrimitiva".$_POST["fechasorteo"]."txt", "w"); //Cada fichero debería tener una fecha que permita diferenciar cada sorteo. 

	fwrite($ficheroPremios, "La recaudación del sorteo ha sido :" . $_POST["recaudacion"]."\r\n");
if ($ganadores[6]==0) { //Si los ganadores de 6 aciertos son 0
	fwrite($ficheroPremios, "C6". " " .$ganadores[6]. " ganadores" ."\r\n"); //Escribe que no ha habido ganadores 
} else { //Si si hay algún ganador: 
	fwrite($ficheroPremios, "C6". " " .$ganadores[6]. " ganadores" . " Que se reparten en euros: " . (($_POST["recaudacion"]*0.80)*0.4)/$ganadores[6] ."\r\n"); 
}
if ($ganadores[7]==0) { 
	fwrite($ficheroPremios, "C5+complementario ". " " .$ganadores[7]. " ganadores" ."\r\n"); 
} else { 
	fwrite($ficheroPremios, "C5+complementario  ". " " .$ganadores[7]. " ganadores" . " Que se reparten en euros: " . (($_POST["recaudacion"]*0.80)*0.3)/$ganadores[7] ."\r\n"); 
}
if ($ganadores[5]==0) { 
	fwrite($ficheroPremios, "C5". " " .$ganadores[5]. " ganadores" ."\r\n");  
} else { 
	fwrite($ficheroPremios, "C5 ". " " .$ganadores[5]. " ganadores" . " Que se reparten en euros: " . (($_POST["recaudacion"]*0.80)*0.15)/$ganadores[5] ."\r\n"); 
}
if ($ganadores[4]==0) { 
	fwrite($ficheroPremios, "C4". " " .$ganadores[4]. " ganadores" ."\r\n"); 
} else { 
	fwrite($ficheroPremios, "C4 ". " " .$ganadores[4]. " ganadores" . " Que se reparten en euros: " . (($_POST["recaudacion"]*0.80)*0.05)/$ganadores[4] ."\r\n"); 
}
if ($ganadores[3]==0) { 
	fwrite($ficheroPremios, "C3". " " .$ganadores[3]. " ganadores" ."\r\n");  
} else { 
	fwrite($ficheroPremios, "C3 ". " " .$ganadores[3]. " ganadores" . " Que se reparten en euros: " . (($_POST["recaudacion"]*0.80)*0.08)/$ganadores[3] ."\r\n"); 
}
if ($ganadores[8]==0) { 
	fwrite($ficheroPremios, "CReintegro". " " .$ganadores[8]. " ganadores" ."\r\n"); 
} else {  
	fwrite($ficheroPremios, "CReintegro ". " " .$ganadores[8]. " ganadores" . " Que se reparten en euros: " . (($_POST["recaudacion"]*0.80)*0.02)/$ganadores[8] ."\r\n"); 
}
} //fin funcion crearFichero;


//Ahora quedaría sacarlo por pantalla. Imprimiendo las bolas 

function imprimirPrimitiva ($ganadores, $aciertosCategorias) {

$posicionReintegro=count($ganadores)-1;
//NumerosGanadores BOLAS 
	for ($i=0; $i<count($ganadores)-2; $i++) { //Con el count se cuenta la longitud del array (8) y le resto 2 porque quiero que llegue hasta la posición 6. La 7 es las del reintegro y es una bola diferente. 
	echo "<img src='img/".$ganadores[$i].".png' width='30px'>"; 
	}//fin bucle for
	echo "<img src='img/rbola".$ganadores[$posicionReintegro].".png' width='50px'>"; //Se imprime fuera del bucle porque las bolas del reintegro tienen otro nombre.
	echo "<br><br>";
//CONTAMOS LAS FILAS DE LA APUESTA
$fichero1="r22_primitiva.txt";
$archivo = fopen ($fichero1, "r");
//inicializo una variable para llevar la cuenta de las líneas y los caracteres
$num_lineas = 0;
$caracteres = 0;
//numero lineas de la apuesta
while (!feof ($archivo)) {
    //si extraigo una línea del archivo y no es false
    if ($linea = fgets($archivo)){
       //acumulo una en la variable número de líneas
       $num_lineas++;
    }//cierre if
}//cierre while 

$numeroApuestas=$num_lineas-1;
//Apuestas jugadas: 
//Acertantes 6 números. 
//Acertantes 5 + Complementario números. 
//Acertantes 4 números. 
//Acertantes 3 números. 
//Acertantes Reintegros. 
//Sin premio 2 números: 
//Sin premio 1 números: 
//Sin premio 0 números: 	

echo "Apuestas Jugadas: $numeroApuestas". "<br>";
echo "Acertantes 6 números: " . $aciertosCategorias[6] . "<br>";
echo "Acertantes 5+Complementario números: " . $aciertosCategorias[7] . "<br>";
echo "Acertantes 5 números: " . $aciertosCategorias[5] . "<br>";
echo "Acertantes 4 números: " . $aciertosCategorias[4] . "<br>";
echo "Acertantes 3 números: " . $aciertosCategorias[3] . "<br>";
echo "Acertantes Reintegros: " . $aciertosCategorias[8] . "<br>";
echo "Sin premio con 2 aciertos: " . $aciertosCategorias[2] . "<br>";
echo "Sin premio con 1 acierto: " . $aciertosCategorias[1] . "<br>";
echo "Sin premio con 0 aciertos: " . $aciertosCategorias[0] . "<br>";





}//fin de la funcion 

 ?>