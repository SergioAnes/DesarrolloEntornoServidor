<meta http-equiv="Content-type" content="text/html" charset="utf-8"/> 

<?php 
//recogida de las variables
$ficheroOrigen=$_POST['ficheroOrigen'];
$ficheroDestino= $_POST['ficheroDestino'];
$opcionEscogida= $_POST['operacion'];
//limpieza de las variables
$ficheroOrigen=limpiar_campos($ficheroOrigen);
$ficheroDestino=limpiar_campos($ficheroDestino);
$opcionEscogida=limpiar_campos($opcionEscogida);

//controlar con mensaje de error en caso de que el fichero principal no exista. 
//Si es necesario, se creará incluso un fichero en la carpeta de destino. 
//Ahora tengo que evaluar la opcion escogida. 

if (file_exists($ficheroOrigen)) {
	if (!strcmp("copiarFichero", $opcionEscogida)){ //comprobamos cuál ha sido la opción marcada. Recordemos que si coinciden da 0, por lo que se usa ! para que haga el true. 
		if (!file_exists($ficheroDestino)) { //si el fichero de destino NO EXISTE, entonces se hace la copia. 
			if (copy($ficheroOrigen, $ficheroDestino)) {  //Si la copia se hace bien, pues el archivo se ha copiado correctamente. 
   				echo "Se ha copiado el archivo corretamente";
   			} else {
				echo "Ha habido un error en la copia";
   			}//final else;
		}//final if
		else { //si el fichero de destino no existiese, se indica. 
			echo "El fichero de destino ya existe";
		}//final else
	}//final if de copiar fichero 
	if (!strcmp("renombrarFichero",$opcionEscogida)) { 
		if (rename($ficheroOrigen,$ficheroDestino)) {
		 echo "El fichero se ha renombrado correctamente";
		}
		else {
			echo "El fichero no se ha renombrado correctamente";
		}//final else. 
	}//final if	
	if (!strcmp("borrarFichero",$opcionEscogida)) {
		unlink ($ficheroOrigen);
		echo "El fichero ha sido eliminado";
	}//final if
}//final if 
else {//si por lo que sea el fichero de origen no existe. 
	echo "El fichero de origen NO EXISTE";
}//final else

//funcion de limpieza de parámetros 
function limpiar_campos($variableRecogida) {
  $variableRecogida = trim($variableRecogida); //elimina espacios en blanco por izquierda/derecha
  $variableRecogida = stripslashes($variableRecogida); //elimina la barra de escape "\", utilizada para escapar caracteres
  $variableRecogida = htmlspecialchars($variableRecogida); 
  return $variableRecogida;  
}

?>