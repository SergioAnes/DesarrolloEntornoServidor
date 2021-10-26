<?php 



//Recepcion de parametros 

// definición de variables de error
$nombre1error = $apellido1error = $apellido2error = $emailerror = $genero1error ="";

// definición de variables para recuperar valor campos
$nombre1 = $apellido1 = $apellido2 = $email = $genero1 ="";

//DATOS ALUMNO 1
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nombre"])) {
    $nombre1error  = "Nombre es obligatorio";
  } else {
    $nombre1 = limpiar_campos($_POST["nombre"]);
  }
    if (empty($_POST["apellido1"])) {
    $apellido1 = "";
  } else {
    $apellido1 = limpiar_campos($_POST["apellido1"]);
  }
  if (empty($_POST["apellido2"])) {
    $apellido2 = "";
  } else {
    $apellido2 = limpiar_campos($_POST["apellido2"]);
  }
  if (empty($_POST["email"])) {
    $emailerror  = "email es obligatorio";
  } else {
    $email = limpiar_campos($_POST["email"]);
  }
  if (empty($_POST["gender"])) {
    $genero1error = "Sexo es obligatorio";
  } else {
    $genero1 = limpiar_campos($_POST["gender"]);

    if (!strcmp("Hombre", $genero1)) {

      $genero1 = "H";
    } else {

      $genero1 = "M";;
    }
  }

}

//Limpieza del codigo
function limpiar_campos($variableRecogida) {
  $variableRecogida = trim($variableRecogida); //elimina espacios en blanco por izquierda/derecha
  $variableRecogida = stripslashes($variableRecogida); //elimina la barra de escape "\", utilizada para escapar caracteres
  $variableRecogida = htmlspecialchars($variableRecogida); 


  return $variableRecogida;
   
}


 ?>