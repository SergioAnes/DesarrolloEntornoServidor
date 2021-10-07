

<?php 

//EJERCICIO SERGIO ANES GALÁN

//Se crean las dos estructuras basicas de arrays.
$carton=array();
$bombo=array();


//Se crean numeros aleatorios que NO SE REPITAN, para ello se hace uso de la funcion in_array. 
$i=0;  
while($i<15)  
{  
    $numerosCarton=rand(1,60);  
    if(in_array($numerosCarton,$carton)===false) //Si el numero de carton, generado aleatoriamente, si no se encuentra, devuelve FALSE. 
    {  
        array_push($carton,$numerosCarton);  //si devuelve false, entonces se añade en el carton el numero creado. 
        $i++;  
    }  
}  


//Se crean los numeros para el bombo sin que tampoco se repitan.
$i=0;  
while($i<60)  
{  
    $numerosBombo=rand(1,60);  
    if(in_array($numerosBombo,$bombo)===false) //
    {  
        array_push($bombo,$numerosBombo);  //
        $i++;  
    }  
}  


$aciertos=0;
$tachados=array();


while ($aciertos<15){

	do {
		$numerosBombo=rand(1,60);
	} while (in_array($numerosBombo,$tachados)) {

			array_push($tachados,$numerosBombo);

		

	}




}

$coincidencias = array_intersect($carton, $bombo);

foreach($coincidencias as $value) {
    echo $value;
}

var_dump($carton); 
var_dump($bombo);


echo "<br>";

var_dump($coincidencias);




 ?>