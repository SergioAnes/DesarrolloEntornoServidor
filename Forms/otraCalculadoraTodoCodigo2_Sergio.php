<HTML>
<HEAD> <TITLE> CALCULADORA </TITLE>
</HEAD>
<BODY>



<h1 align="center"> CALCULADORA </h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 


Escribe el primer numero: 
<input type='text' name='operando1' value='' size=15><br>

<br><br>

Escribe el segundo numero:
<input type='text' name='operando2' value=''><br>


<input type='radio' name='operacion' value='Suma'>Suma</br>
<input type='radio' checked name='operacion' value='Resta'>resta</br>
<input type='radio' name='operacion' value='Divide'>divide</br>
<input type='radio' name='operacion' value='Multiplica'>multiplica</br>

<input type="submit" value="enviar">

<input type="reset" value="borrar">


<?php

//SERGIO ANES

include("otraCalculadora2_Sergio.php");

?> 


</FORM>
</BODY>
</HTML>
