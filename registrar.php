<?php

include("con_db.php");

if (isset($_POST['register'])) {

    //tomamos todos los datos correspondientes para meterlos en la base de datos y registrar al usuario   
    $Name = trim($_POST['Name']);
    $UserName = trim($_POST['UserName']);
    
    //Encryptacion de contraseña MD5 con el metodo hash
    
    $password = trim($_POST['Password']);
    $password = hash('md5',$password);
    
    
    //$password = md5('$password');
    
    $Email = trim($_POST['Email']);

    //esta  dos lineas de codigo insertan los datos en la base de datos

    $consulta = "INSERT INTO admins ( Nombre, NombreUsuario, Password , email ) VALUES ('$Name', '$UserName', '$password', '$Email')";
    $resultado = mysqli_query($conex, $consulta);

    //SI en cadena para mensajes de que el registro haya sido exitoso o haya fracasado 
    //Falta validar el por que fue el error y mostrarlo en un MESSAGE

    if ($resultado) {
        ?>
        <h3 class="ok"> TE HAS REGISTRADO </h3>
        <?php
    } else {
        ?>
        <h3 class="bad"> HAY UN ERROR </h3>
        <?php
    } 

 }

 ?>
