<?php
session_start();
var_dump($_SESSION);
session_unset();
session_destroy();
?>
<html>
<head>
<meta charset="UTF-8"/>
<title>Pagina 3</title>
</head>
<body>
<p>Has Cerrado Sesion</p>
<br /><a href="comlogincli.php"> Volver a Login</a>
</body>
</html>