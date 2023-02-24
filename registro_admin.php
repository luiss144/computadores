<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Registro</title>
</head>
<body>
    <div>

<!-- Formulario con metodo POST para la captura de datos y los input con REQUIRED para validar que ningun campo este vacio -->

    <form method="post">
        
        <h1>Registro Administradores</h1><br>

        <label for=""> Nombre</label>
        <input type="text" name="Name" placeholder="Nombre" required><br>
        <label for=""> Nombre De Usuario</label>
        <input type="text" name="UserName" placeholder="NombreUsuario" required><br>
        <label for=""> Contraseña</label>
        <input type="password" name="Password" placeholder="Contraseña" required><br>
        <label for=""> Correo Electronico</label>
        <input type="email" name="Email" placeholder="Correo Electronico" required><br>

        <!-- este input es el que manda toda la informacion a la base de datos -->
        
        <input type="submit" value="REGISTRAR" name="register"><br>

        <!-- boton que nos redireciona a la pagina de login  -->
        
        <a href="index.php"> <input type="button" value="INICIAR SESION"> </a>

    </form>
    
</div>

<!-- se llama la clase registrar para que capture todos los datos en los input cuando se presione el input SUBMIT -->
    
    <?php
        include("registrar.php")
    ?>

</body>
</html>



