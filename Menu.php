<?php
    
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo'
          <script>
              alert(" por favor iniciar seccion");
              window.location= "index.php";
          </script>

        ';
       
        session_destroy();
        die();
    }


 

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">
    <title></title>
</head>
<body>

    <form action="" method="post">

        <h1> MENU ADMINISTRADOR </h1>

        <a href="registro_admin.php"> <input type="button" value="Registrar Admin"> </a><br>
        <a href="Listar.php"> <input type="button" value="Listar Admin" ></a><br>
        <a href="computadores.php"> <input type="button" value="Computadores"> </a><br>
        <a href="sedes.php"> <input type="button" value="Sedes"> </a><br>
        <a href="salas.php"> <input type="button" value="Salas"> </a><br>


        <a href="cerrar.php"> <input type="button" value="CERRAR SESSION"> </a><br>

    </form>
    
</body>
</html>

