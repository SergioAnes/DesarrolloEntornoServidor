<?php 

//EJERCICIO de SERGIO ANES GALÁN. 

//Se crea la estructura general: 

$longitudCarton=15;
$numeroJugadores=4;
$numerodeCartones=3;
$bolasBombo=60;

//primer array
$jugadores = array();

//Se crean los jugadores y los cartones correspondientes. 

      for ($i=0; $i<$numeroJugadores; $i++) { 
 
            $jugadores["jugador".$i] = array(); //jugadores es un array de jugadores (jugador1, jugador2, jugador3, jugador4)  //Y cada jugador tiene un array de cartones (carton1, carton2, carton3).

        for ($j=0; $j<$numerodeCartones; $j++) { 

            $jugadores["jugador".$i]["carton".$j] = array(); //cada carton a su vez lleva otro array, en este caso las bolas que voy a generar en el siguiente paso. 

            $x=0;

            while($x<$longitudCarton) {  //mientras que X (el numero de bolas) sea menor que longitud (15 en este caso) genera un numero al azar entre 1 a 60.

        $numerosCarton=rand(1,60);  

            if(in_array($numerosCarton,$jugadores["jugador".$i]["carton".$j])===false) {  //Si el numero que se genera NO ESTÁ en $jugadores["jugador".$i]["carton".$j]), es decir, en lo que seria el array de cartones, entonces que lo añada. 
                $jugadores["jugador".$i]["carton".$j][$x]= $numerosCarton;  //pasale el numero aleatorio generado y único a la posición X del cartón. 
                $x++;  
            }  
        }  
                          
        }     

    }
  var_dump($jugadores);   


//ahora queda ir comparando la bola sacada con los numeros que hay en los cartones. 


                $aciertosJugador1 = array(0,0,0);  // Se crean arrays para meter los aciertos. Si se llega a 15, querrá decir que el cartón ha sido completado. 

                $aciertosJugador2 = array(0,0,0);

                $aciertosJugador3 = array(0,0,0);

                $aciertosJugador4 = array(0,0,0);

                $ganaJugador1 = false; 

                $ganaJugador2 = false;

                $ganaJugador3 = false;

                $ganaJugador4 = false;

    $fueradelBombo=array();


    for ($x=0; $x<60; $x++) { //Mientras la X sea menor que 60, es decir, mientras que no saque 60 bolas, que siga sacando hasta que haya un ganador. 

        do {

            $numeroAleatorio=rand(1,60); //se genera numero aleatorio

        }
     
       while (in_array($numeroAleatorio,$fueradelBombo));  //Mientras el numero aleatorio que se ha generado esté fuera del bombo, sigue sacando numeros aleatorios. 

            array_push($fueradelBombo,$numeroAleatorio); //Aqui solo va a llegar si el numero ha pasado el filtro anterior, es decir, lo añade a la lista de fuera si NO ESTABA. 

        

        for ($i=0; $i<$numeroJugadores; $i++) { //Se recorren jugadores y cartones con dos bucles, tal y como se ha hecho para crearlos. 
 

            for ($j=0; $j<$numerodeCartones; $j++) { 


                 if (in_array($numeroAleatorio,$jugadores["jugador".$i]["carton".$j])){  // Y se comprueba el numero en cada uno de los cartones de cada jugador. Esto quizá consume muchos recursos.

                                    if ($i == 0){  // Si la i es 0, estamos con el jugador 0. 

                                            $aciertosJugador1[$j] +=1; //

                                        if ($aciertosJugador1[$j] == 15){  // 

                                            
                                             echo "<br>Ha ganado el jugador $i con el carton ". $j . "<br>";

                                            $ganaJugador1 = true;

                                        }


                                     }

                                    if ($i == 1) {  // Si es el jugador 2

                                            $aciertosJugador2[$j] +=1;

                                        if ($aciertosJugador2[$j] == 15){ 
                                             
                                             echo "<br>Ha ganado el jugador $i con el carton ". $j . "<br>";

                                            $ganaJugador2 = true;

                                        }


                                     }


                                     if ($i == 2){  // Si es el jugador 3

                                            $aciertosJugador3[$j] +=1;

                                        if ($aciertosJugador3[$j] == 15){  

                                             
                                             echo "<br>Ha ganado el jugador $i con el carton ". $j . "<br>";

                                            $ganaJugador3 = true;

                                        }


                                     }


                                     if ($i == 3){  // Si es el jugador 4

                                            $aciertosJugador4[$j] +=1;

                                        if ($aciertosJugador4[$j] == 15){  

                                             
                                             echo "<br>Ha ganado el jugador $i con el carton ". $j . "<br>";

                                            $ganaJugador4 = true;

                                        }


                                     }

                 } 
            } 
        } 
    

         if ($ganaJugador1 || $ganaJugador2 || $ganaJugador3 || $ganaJugador3) {

                    break; //Si alguien gana antes de las 60 bolas, rompe el bucle y da los ganadores sin esperar a sacar más bolas, porque no hace falta. 

         }

     }   


 ?>