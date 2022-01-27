<html>
    <head>
        <title>LOGIN</title>
    </head>
    <body>
        <form action="pe_login.php" method="POST">
            <h1>Login</h1>

            <label>USUARIO: </label> 
            <input type="text" name="usuario" required/><br/>
            
            <label>CONTRASEÑA: </label>
            <input type="password" name="password" required/><br/>

            <input type="submit" value="LOGIN"/>
        </form>

        <?php
            if($_POST){ //Cuando se completan los datos, se viene aquí. 
                include('../funciones/funcionespe_login.php');
                $conexion = abrirConexion();
                $usuario= test_input($_POST['usuario']);
                $password= test_input($_POST['password']);
                //Consulta: ¿Hay algún cliente con el usuario y la contraseña introducidas? Si es que sí, entonces entra en el if, si no dice que son incorrectos. 
                $query=$conexion->prepare("SELECT CustomerNumber, ContactLastName FROM Customers WHERE CustomerNumber= :usuario AND ContactLastName = :password");
                $query->bindParam(":usuario", $usuario); //Esto es simplemente una asociación de variables. Hasta que no se ejecuta, no se hace. 
                $query->bindParam(":password", $password); //Se asocia el password introducido por el usuario a :password. 
                $query->execute();
                $usuarioLogin=$query->fetch(PDO::FETCH_ASSOC); //Crea un array indexado: $usuarioLogin[CustomerNumber] = daría el usuario solicitado en la consulta. 

                if ($usuarioLogin){
                    session_start(); //Se inicia sesion.
                    $_SESSION['CustomerNumber'] = $usuarioLogin["CustomerNumber"];
                    $_SESSION['usuarioContraseña'] = $usuarioLogin["ContactLastName"];
                    header("location:pe_inicio.php"); //La función header() se puede utilizar para redirigir automáticamente a otra página, enviando como argumento la cadena Location:
                }else{
                    echo "Usuario o password incorrecto";
                }
            } 
        ?>
    </body>
</html>