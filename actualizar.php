<?php 
    include("con_db.php");

$id=$_GET['id'];

$sql="SELECT * FROM computador WHERE cod_computador='$id'";
$query=mysqli_query($conex,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
     
        
    </head>
    <body>
                <div class="">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="cod_computador" value="<?php echo $row['cod_computador']  ?>">
                                <input type="text" class="form-control mb-3" name="sede" placeholder="Sede" value="<?php echo $row['sede']  ?>">
                                <input type="text" class="form-control mb-3" name="sala" placeholder="Sala" value="<?php echo $row['sala']  ?>">
                                
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>