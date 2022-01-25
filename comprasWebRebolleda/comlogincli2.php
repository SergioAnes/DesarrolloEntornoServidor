<?php
    session_start();
    if(isset($_SESSION["usuarioNombre"])){
?>

<html>
<?php echo "Has iniciado sesion: ". $_SESSION['usuarioNombre'];?>    
    <p>PROBANDO</p>
    <p><a href='comconscom.php'> Comprobar stock </a></p>
	<p><a href='compro.php'> Comprar producto </a></p>
    <a href="comlogincli3.php"><p>CERRAR SESION</p></a>
</html>

<?php
    }else{
        header("location:comlogincli.php"); 
    }
?>