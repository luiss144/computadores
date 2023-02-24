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
<html>
    <link rel="stylesheet" href="vista.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</html>

<?php

$inc = include("con_db.php");

//hacemos una funcion que valide los datos de la tabla los asigne a un array para asi mostrarlos en una tabla

if ($inc) {
    $consulta = "SELECT * FROM admins";
    $resultado = mysqli_query($conex,$consulta);
    if ($resultado) {
        while ($row = $resultado -> fetch_array()){
           
            $Name = $row['Nombre'];
            $UserName = $row['NombreUsuario'];
            $email = $row['email'];
            $password = $row['Password'];
            ?>

            <div>
            <!-- metemos los datos del array en un formulario que contiene una tabla y asi listar  -->
                <form method="post">
                    <table>
                        <tr>
                        <thead>
                        <th><b>Administrador: </b></th>
                        <th><b>Usuario: </b></th>
                        <th><b>Correo Electronico: </b></th>
                        <th><b>Contraseña: </b></th>
                        </tr>

                        <tr>
                        <td> <?php echo $Name; ?></td>
                        <td> <?php echo $UserName; ?></td>
                        <td> <?php echo $email; ?></td>
                        <td> <?php echo $password; ?></td>
                        </tr>


                        </thead>
        </table>
        </form>
                </div>

            <?php

        }
    }
}

?>