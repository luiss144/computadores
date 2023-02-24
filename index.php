<?php
//llamamos la base de datos y comparamos los datos registrados para empezar con el inicio de sesion
    session_start();
   
    
    if(isset(  $_SESSION['usuario'] )){
        header("location: Menu.php");
       
    }






    include ("con_db.php");
    include ("user.php");
   
 
 
    
//Validacion para que los datos ingresados sean los correctos con los que estan el base de datos y no esten repetidos

if (isset($_POST["validar"])) {
    
    $NombreUsuario = $_POST["UserName"];
    $Password = $_POST["Password"];
     $password = trim($_POST['Password']);
    $password = hash('md5',$password);
    
    $true=false;
    $consulta = "SELECT * FROM admins WHERE NombreUsuario='$NombreUsuario'AND Password='$password'";
    $resultado = mysqli_query($conex, $consulta);
    
     while( $i=$resultado->fetch_assoc()){
        
         if($i['NombreUsuario']==$NombreUsuario && $i['Password']==$password){

             $true=true;
             echo "acceso valido";

            
         }

     }



    if($true){
             $_SESSION['usuario']=$NombreUsuario;
             header("location: Menu.php");
             exit;
             

    }else{
        echo "acceso invalido";
    }
    
}

?>

<!-- Pagina de inicio de sesion para las funciones de administrador -->

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="index.css">
        <title>Inicio de Sesion</title>
</head>
<body>
        <form method="post">
            <h1> INICIAR SESION </h1>
            <label for="">Nombre de Usuario</label><br>
            <input type="text" name="UserName" placeholder="Nombre de usuario" required><br>
            <label for="">Contraseña</label><br>
            <input type="password" name="Password" placeholder="Contraseña" required><br>
           <input type="submit" value="ingresar" name="validar"><br>
           <a href="registro_admin.php"> <input type="button" value="Registrar Admin"> </a><br>
       

        </form>

    
</body>
</html>

