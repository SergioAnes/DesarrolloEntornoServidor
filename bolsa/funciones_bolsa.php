
<?php 

function ponLineaFichero($nombreFichero){
  if(file_exists($nombreFichero)){
    $fichero=fopen($nombreFichero,"r");

	while (!feof($fichero)) {
		
  		if(file_exists($nombreFichero)){
    	$linea = fgets($fichero);
    	echo $linea.'<br/>';
  	}
  else {
    echo "El fichero indicado no existe en la ruta indicada";
  }
  	}
  }
  fclose($fichero);
}

 ?>