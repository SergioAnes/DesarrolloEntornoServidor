<meta http-equiv="Content-type" content="text/html" charset="utf-8"/> 
<?php 
//Recepción de parámetros 
$fichero=$_POST['nombreFichero'];

//Tengo que meter el path (la ruta del fichero) y sacar: 
//Nombre del fichero, directorio, tamaño, fecha modificación del fichero. 

//Supongo que habrá otras formas, pero yo he sacado estas. 
$nombre= pathinfo($fichero, PATHINFO_FILENAME);
$tamano = filesize($fichero);

//Y ahora qúedaría imprimirlo por pantalla. 
if (file_exists($fichero)) {
echo "Nombre del fichero: " . $nombre . "<br>";
echo "Dirección del fichero: ". dirname($fichero) ."<br/>"; //direccion del fichero
echo "Tamaño del fichero: " . $tamano . "<br>";
echo "La última modificación de $fichero fue: " . date("F d Y H:i:s.", filemtime($fichero));
} //fin if
else {
	"El fichero no existe";
}//fin else

?>