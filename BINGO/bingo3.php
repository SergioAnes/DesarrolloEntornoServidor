<?php 

//EJERCICIO de SERGIO ANES GALÁN. 

//Se crea la estructura basica de array.
$carton=array();

//Se crean numeros aleatorios que NO SE REPITAN DEL CARTON, para ello se hace uso de la funcion in_array.
$i=0;  
while($i<15)  
{  
    $numerosCarton=rand(1,60);  
    if(in_array($numerosCarton,$carton)===false) //Si el numero aleatorio no se encuentra en el cartón, devuelve FALSE. 
    {  
        array_push($carton,$numerosCarton);  //Y si devuelve false, entonces se añade al cartón, porque es un número que NO ESTABA.  
        $i++;  
    }  
}  

echo "Mi carton tiene los siguientes numeros: ";

for ($i=0; $i<count($carton); $i++) {  //Ahora imprimo los números del cartón para verlos en pantalla. 

    echo "$carton[$i] /";
}

    echo "<br>";

$numerosTachados=0;
$fueradelBombo=array();

    while($numerosTachados < count($carton)) { //Aquí le digo: Oye, haz esto hasta que haya sacado los 15 números de mi cartón; es decir, hasta que haya 15/15 tachados. 
  
        $numeroAleatorio=rand(1,60); //genero un número aleatorio. 

       if (!in_array($numeroAleatorio,$fueradelBombo)) { //Para que no se repita, le digo: Si el numero aleatorio ya estaba fuera del bombo, no se puede volver a sacar! Porque no debería estar.

            array_push($fueradelBombo,$numeroAleatorio);
         

        echo "El numero al azar es: $numeroAleatorio <br>";

        for($i=0; $i<count($carton); $i++){ //Una vez que ya tenemos la bola, aquí simplemente recorro el cartón para ver si hay coincidencias entre la "bola sacada" y alguno de los números de mi cartón. 

            if($numeroAleatorio===$carton[$i]) { //Si la bola sacada coincide con uno de los números de mi cartón, entonces... 
                $carton[$i]="X"; //entonces ponle una X a ese numero. Es decir, machácalo por una X, porque ya no me interesa. 
                $numerosTachados++; //Y, por supuesto, incrementa el contador de números tachados.

         }
             echo("$carton[$i]/");
        }
             echo("<br>");
        
        }

        
    }//fin del while principal. 

    echo "Has conseguido el BINGO. Enhorabuena, Sergio :)"; 

 ?>