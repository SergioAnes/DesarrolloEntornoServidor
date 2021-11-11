<meta http-equiv="Content-type" content="text/html" charset="utf-8"/> 
<?php 
//Sergio Anes. 
//Recepción de parámetros
//Averiguar la operacción seleccionada. 
$fichero=$_POST['nombreFichero'];
$operacion= $_POST['operacion']; //Hay tres opciones a evaluar: mostrarFichero, mostrarLineaFichero y mostrarXLineas;
//dado el caso, saber el numero de línea o las primeras líneas 
$numeroLinea =  $_POST['numeroLinea'];
$primerasLineas =  $_POST['primerasLineas'];
//Una vez que tengo las variables, hay que hacer las comprobaciones. 
	if (file_exists("ficheros/".$fichero)){
			if (!strcmp("mostrarFichero", $operacion)) {//Si coinciden, devuelve 0, por eso se le pone el !.
				//Si se selecciona mostrar el fichero, se usa el file_get_contents No hace falta que lo abra $ficheroAbierto = fopen("ficheros/".$fichero,"r"); //abre el fichero y pásalo a una variable. 
				echo file_get_contents("ficheros/".$fichero); //lee todo el contenido de la variable que contiene el fichero 
			}//final if	  
			if (!strcmp("mostrarLineaFichero", $operacion)) {
				//Si quiere seleccionar una línea determinada, se puede convertir a array y sacar la posición que ocupa cada línea en el array. Eso se hace con file 
				$ficheroAbierto = file("ficheros/".$fichero); //pasamos el fichero a un array en el que cada línea ocupa una posición. 
				echo $ficheroAbierto[$numeroLinea-1]; //Si la linea que queremos es el 5, el array empieza desde 0, así que hay que restarle uno para que salga la línea que en el texto ocupe la posición 5.           
			}//final if
			if (!strcmp("mostrarXLineas", $operacion)) { //Aquí tendría que imprimir tantas líneas como el usuario ponga en el formulario. 
				//Se podría usar un contador: 
				$ficheroAbierto = fopen("ficheros/".$fichero,"r"); //apertura del fichero en modo lectura. 
				$contador = 0; //empieza en 1, como la línea.
				if ($primerasLineas!=0){ //Tiene que ser diferente a 0, porque si no da error, se hace bucle infinito. 
					do { //Haz esto, es decir, imprime las lineas del fichero
						echo fgets($ficheroAbierto) . "<br>";
						$contador++; //después de imprimir una línea, que el contador se incremente +1. 
					} while ($contador!=$primerasLineas);//mientras que el contador sea diferente de la línea introducida. 
				}//final if 
				else {
					echo "Introduce una línea válida";
				}//final else
			}//final if
	}//Final del IF principal 
	else {
		echo "El fichero no existe";
	}//fin else
 ?>