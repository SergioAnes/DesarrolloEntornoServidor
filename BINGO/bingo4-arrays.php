<?php 

//EJERCICIO de SERGIO ANES GALÁN. 

//Se crea la estructura general: 

$longitudCarton=15;
$numeroJugadores=2;
$numerodeCartones=3;
$jugadores = array();

//Se crean numeros aleatorios que NO SE REPITAN DEL CARTON, para ello se hace uso de la funcion in_array. Se asocian a las posiciones de los jugadores. 

      for ($i=0; $i<$numeroJugadores; $i++) {

        for ($j=0; $j<$numerodeCartones; $j++) {

            $carton=array();
            $x=0;
            while($x<$longitudCarton) {  

        $numerosCarton=rand(1,60);  

            if(in_array($numerosCarton,$carton)===false) {  

                  array_push($carton,$numerosCarton);  

                $x++;  
            }  
        }  
            $jugadores[$i][$j] = $carton;                    
        }     

    }

  var_dump($jugadores);   

/*
$numerosTachados=0;
$fueradelBombo=array();

    while($numerosTachados < count($carton)) { 
        $numeroAleatorio=rand(1,60); 

       if (!in_array($numeroAleatorio,$fueradelBombo)) { 
            array_push($fueradelBombo,$numeroAleatorio);
         
        echo "El numero al azar es: $numeroAleatorio <br>";
            for($i=0; $i<$numeroJugadores; $i++) { 
                for ($j=0; $j<$numerodeCartones; $j++) {
                if($numeroAleatorio === $jugadores[$i][$j]) { 
                $jugadores[$i][$j]="X";  
                $numerosTachados++; 
                }
            }//

          }   
        }//fin de toda la condicion if PRINCIPAL, en la que solo se va a entrar si el numero aleatorio generado todavía no ha salido.  
    }//fin del while principal. 
    echo "Has conseguido el BINGO. Enhorabuena."; 
    */

 ?>