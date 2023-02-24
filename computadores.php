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



    include("con_db.php");
    

    $sql="SELECT *  FROM computador";
    $query=mysqli_query($conex,$sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> COMPUTADORES</title>
         <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
      
        
    </head>
    <body>
            <div class="">
                    <div > 
                        
                        <div class="">
                            <h1>Ingrese datos</h1>
                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="cod_computador" placeholder="cod computador"required>
                                    <input type="text" class="form-control mb-3" name="sede" placeholder="Sede">
                                    <input type="text" class="form-control mb-3" name="sala" placeholder="Sala">
                                    
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="">
                            <table class="table" >
                                <thead class="" >
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Sede</th>
                                        <th>Sala</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['cod_computador']?></th>
                                                <th><?php  echo $row['sede']?></th>
                                                <th><?php  echo $row['sala']?></th>    
                                                <th><a href="actualizar.php?id=<?php echo $row['cod_computador'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['cod_computador'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>