<!DOCTYPE html>
<html>
<head>
	<title>ej7am.php
	</title>
</head>
<body>

	<?php 

	//Programa ej7am.php definir una matriz que permita almacenar la nota de 10 alumnos en 4 asignaturas diferentes. Se pide:
	//Mostrar por pantalla el alumno con mayor nota en una asignatura determinada.
	//Mostrar por pantalla el alumno con menor nota en una asignatura determinada.
	//Para un alumno, mostrar en que materia tiene su nota más baja.
	//Para un alumno, mostrar en que materia tiene su nota más alta.
	//Mostrar la media por materia de todos los alumnos.
	//Mostrar la media por alumno para todas las materia

	$numeroAlumnos=10;
	$numeroAsignaturas=4;


	//Creacion de valores y asociacion en la tabla 
	$nombre="Alumno";
	$alumnos=array();

	for ($i=0; $i<10; $i++) {

		$alumnos["$nombre$i"] = array ( //en un array no asociativo, para acceder a la primera nota, pondría: $alumnos[0][0], pero aquí pondría $alumnos["Alumno0"]["Base de datos"];

			"Base de datos" => rand(0,10),
			"Programacion" => rand(0,10),
			"Entorno Servidor" => rand(0,10),
			"Desarrollo Web" => rand(0,10)			
		);		

	}

print_r($alumnos);

echo "<br>";
echo "<br>";
echo "<br>";
echo $alumnos["Alumno0"]["Base de datos"];
echo "<br>";
echo "<br>";
	
	//Ahora voy a recorrerlo con un bucle foreach. 
	foreach ($alumnos as $alumno => $nombre) {

			echo "El $alumno ";

		foreach ($nombre as $asignatura => $nota) {

			echo "$asignatura: $nota ";
			
		}
			echo "<br>";
	}


	echo "<br>";
	echo "<br>";
    //Ahora toca mostrar el alumno con mayor nota y el alumno con menor nota. Para eso sí que hay que recorrer el array. 
	//Para un alumno, mostrar en que materia tiene su nota más baja.
	//Para un alumno, mostrar en que materia tiene su nota más alta.

	$mayorNota=$alumnos["Alumno0"]["Base de datos"];
	$menorNota=$alumnos["Alumno0"]["Base de datos"];

	foreach ($alumnos as $alumno => $nombre) {

		foreach ($nombre as $asignatura => $nota) {

			if ($nota>=$mayorNota) {

				$mayorNota=$nota;
				$nombreAlumnoalta=$alumno;
				$asignaturaAlta=$asignatura;
			}

			if ($nota<=$menorNota) {

				$menorNota=$nota;
				$nombreAlumnobaja=$alumno;
				$asignaturaBaja=$asignatura;

			}		
		}		
	}

	echo "La nota mas alta es $mayorNota y el alumno que la ha conseguido es $nombreAlumnoalta en la asignatura $asignaturaAlta <br>"; //¿Problema? Que si dos alumnos tienen un 10, el que sale es el que está puesto primero y no el segundo. 
	echo "La nota mas baja es $menorNota y el alumno que la ha conseguido es $nombreAlumnobaja en la asignatura $asignaturaBaja <br>"; 


		echo "<br>";
		echo "<br>";

	//Mostrar la media por materia de todos los alumnos.
	//Mostrar la media por alumno para todas las materia

		$sumaBasedeDatos=0;
		$sumaProgramacion=0;
		$sumaEntornoServidor=0;
		$sumaDesarrolloWeb=0;


		foreach ($alumnos as $alumno => $nombre) {


		foreach ($nombre as $asignatura => $nota) {

			if ($asignatura=="Base de datos") { //Si se hiciese con for, para sumar las columnas, que es lo que son las asignaturas, diriamos: $alumnos[j][i], la J itinera y la i se queda quieta. Aquí, como no se usan bucles, al estilo del ej2am, pues se fija con el indice, que en vez de ser un numero es un nombre en este caso. Otro ejemplo 6am. 

				$sumaBasedeDatos+=$nota;
				$nameBasedeDatos=$asignatura;
			}

			if ($asignatura=="Programacion") {

				$sumaProgramacion+=$nota;
				$nameProgramacion=$asignatura;
			}

			if ($asignatura=="Entorno Servidor") {

				$sumaEntornoServidor+=$nota;
				$nameEntornoServidor=$asignatura;
			}

			if ($asignatura=="Desarrollo Web") {

				$sumaDesarrolloWeb+=$nota;
				$DesarrolloWeb=$asignatura;

			}
		}		
	}

		echo "La media de los alumnos en $nameBasedeDatos es " . ($sumaBasedeDatos/$numeroAlumnos) . "<br>";
		echo "La media de los alumnos en $nameProgramacion es " . ($sumaProgramacion/$numeroAlumnos) . "<br>";
		echo "La media de los alumnos en $nameEntornoServidor es " . ($sumaEntornoServidor/$numeroAlumnos) . "<br>";
		echo "La media de los alumnos en $DesarrolloWeb es " . ($sumaDesarrolloWeb/$numeroAlumnos) . "<br>";



		//Mostrar la media por alumno para todas las materia
		//Ahora me pide que lo haga por filas... 
		echo "<br>";
		echo "<br>";

		$arrayMedia=array();
		foreach ($alumnos as $alumno => $nombre) {

				$sumafilas=0;

			foreach ($nombre as $asignatura => $nota) {

				$sumafilas+= $nota;

		   }		

		   echo "La media del $alumno para todas las asignaturas es de " . $sumafilas/$numeroAsignaturas . "<br>";
		}



	 ?>

</body>
</html>