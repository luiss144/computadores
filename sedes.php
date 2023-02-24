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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>SEDES</title>
</head>
<body>
    <div >

<!-- Formulario con metodo POST para la captura de datos y los input con REQUIRED para validar que ningun campo este vacio -->

    <form method="post">
        
        <h1>SEDES</h1><br>

        
        
        <input type="submit" value="REGISTRAR SEDES" name="register_SEDES"><br>
         <input type="submit" value="MOSTRAR SEDES" name="mostrar_SEDES"><br>
          <input type="submit" value="MOSTRAR  SALAS POR SEDES" name="mostrar_SALAS"><br>
         
        
    </form>
    
</div>

<!-- se llama la clase registrar para que capture todos los datos en los input cuando se presione el input SUBMIT -->
   <?php

include("con_db.php");





if (isset($_POST['mostrar_SALAS'])) {
?>



    <form method="post">
        
        <h1>MOSTRAR SALAS</h1><br>

       
        <label for=""> Codigo sede</label>
        <input type="text" name="id" placeholder="codigo sede" required><br>
        
        
        <input type="submit" value="BUSCAR" name="mostrar_salas"><br>


    </form>
    



<?php

}
if (isset($_POST['mostrar_salas'])) {
   
?>
<div>
<form method="post" class="CAL">
<table border="3">
<thead>
<tr>
 <th colspan="7" > LISTA DE SALAS</th>


</tr>
</thead>
<tbody>
 
<tr>
   <td>    Codigo Sala           </td>
   <td>   Codigo Sede   </td>
   <td>   Cantidad de computadores     </td>
   <td>   Cantidad Max de computadores      </td>
</tr>

<?php
 $id= trim ($_POST['id']);

$guery="SELECT * FROM salas WHERE cod_sede_sala='$id' ";
$resultado=mysqli_query($conex, $guery) ;

$row=$resultado->fetch_assoc();
      
      ?>
  <tr>  
   <td><?php echo $row['cod_sala'];?></td>
   <td><?php echo $row['cod_sede_sala'];?></td>
   <td><?php echo $row['cant_pc_salas'];?></td>
   <td><?php echo $row['cant_max_pc'];?></td>
 
    
   </tr>

 
</tbody>
</table>
  </form>
</div>
<?php

}

if (isset($_POST['register_SEDES'])) {
?>


<!-- Formulario con metodo POST para la captura de datos y los input con REQUIRED para validar que ningun campo este vacio -->

    <form method="post">
        
        <h1>Registro sedes</h1><br>

        <label for=""> Nombre sede</label>
        <input type="text" name="Name" placeholder="Nombre sede" required><br>
        <label for=""> Codigo sede</label>
        <input type="text" name="id" placeholder="codigo sede" required><br>
        <label for=""> Direccion</label>
        <input type="text" name="dir" placeholder="direccion" required><br>
        <label for=""> telefono</label>
        <input type="number" name="num" placeholder="telefono" required><br>

        <!-- este input es el que manda toda la informacion a la base de datos -->
        
        <input type="submit" value="REGISTRAR" name="register_sedes"><br>


    </form>
    



<?php

}
if (isset($_POST['mostrar_SEDES'])) {
?>
<div>
<form method="post" class="CAL">
<label for="">Escriba codigo sede</label>

<input type="text" name="id" placeholder="codigo sede" required><br>
 <input type="submit" value="modificar" name="modificar_SEDES"><br>
<input type="submit" value="eliminar" name="eliminar_SEDES"><br>

<table border="3">
<thead>
<tr>
 <th colspan="7" > LISTA DE SEDES</th>


</tr>
</thead>
<tbody>
 
<tr>
   <td>    ID           </td>
   <td>   NOMBRE SEDE   </td>
   <td>   DIRECCION     </td>
   <td>   TELEFONO      </td>
   <td>   CANTIDAD DE SALAS 	</td>
</tr>

<?php
$guery="SELECT * FROM sedes";
$resultado=mysqli_query($conex, $guery) ;
while( $i=$resultado->fetch_assoc()){
?>
  <tr>	
   <td><?php echo $i['Codigo_sede'];?></td>
   <td><?php echo $i['Nombre_sede'];?></td>
   <td><?php echo $i['Direccion_sede'];?></td>
   <td><?php echo $i['Numero_telefono'];?></td>
   <td><?php echo $i['Cantidad_salas'];?></td>
   
   </tr>

 <?php  
}
?>
</tbody>
</table>
  </form>
</div>
<?php


}   
if (isset($_POST['eliminar_SEDES'])) {
    $id= trim ($_POST['id']);
$guery="SELECT * FROM sedes WHERE Codigo_sede='$id' ";
$resultado=mysqli_query($conex, $guery) ;
$row=$resultado->fetch_assoc();

if($row['Cantidad_salas']==0){
    $consulta = "DELETE FROM  sedes WHERE Codigo_sede='$id' ";
    $resultado = mysqli_query($conex, $consulta);

    //SI en cadena para mensajes de que el registro haya sido exitoso o haya fracasado 
    //Falta validar el por que fue el error y mostrarlo en un MESSAGE

  

}else{
  echo" NO SE PUEDE ELIMINAR SEDES CON SALAS ASIGNADAS";
  $resultado=false;
}

    if ($resultado) {
        ?>
        <h3 class="ok"> SEDE ELIMINADA </h3>
        <?php
    } else {
        ?>
        <h3 class="bad"> HAY UN ERROR </h3>
        <?php
    }

}


 



   
if (isset($_POST['modificar_SEDES'])) {
$id= trim ($_POST['id']);
$consulta = "SELECT * FROM  sedes WHERE Codigo_sede='$id' ";
    $resultado = mysqli_query($conex, $consulta);
  $row=$resultado->fetch_assoc();
?>
<form method="post">
        
        <h1>Modificar sedes</h1><br>

        <label for=""> Nombre sede</label>
        <input type="text" name="Name" placeholder="Nombre sede" value=<?php echo $row['Nombre_sede'];?> required><br>
        <label for=""> Codigo sede</label>
        <input type="text" name="id" placeholder="codigo sede" value=<?php echo $row['Codigo_sede'];?> readonly onmousedown="return false;"><br>
        <label for=""> Direccion</label>
        <input type="text" name="dir" placeholder="direccion" value=<?php echo $row['Direccion_sede'];?> required><br>
        <label for=""> telefono</label>
        <input type="number" name="num" placeholder="telefono" value=<?php echo $row['Numero_telefono'];?> required><br>
        <td><input type="submit" value="modificar" name="modificar"><br></td>

    </form>

<?php
}   
if (isset($_POST['register_sedes'])) {

    $Name = trim($_POST['Name']);
    $id = trim($_POST['id']);
    $direccion = trim($_POST['dir']);
    $numero = trim($_POST['num']);
    $cantidad = 0;
    
    

    //esta  dos lineas de codigo insertan los datos en la base de datos

    $consulta = "INSERT INTO sedes ( Nombre_sede,Codigo_sede, Direccion_sede , Numero_telefono ,Cantidad_Salas ) VALUES ('$Name', '$id', '$direccion', '$numero', '$cantidad')";
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
 if (isset($_POST['modificar'])) {

    $Name = trim($_POST['Name']);
    $id = trim($_POST['id']);
    $direccion = trim($_POST['dir']);
    $numero = trim($_POST['num']);
    
    

    //esta  dos lineas de codigo insertan los datos en la base de datos

    $consulta =" UPDATE sedes SET Nombre_sede='$Name',Direccion_sede='$direccion',Numero_telefono='$numero' WHERE Codigo_sede='$id'";
    $resultado = mysqli_query($conex, $consulta);

    //SI en cadena para mensajes de que el registro haya sido exitoso o haya fracasado 
    //Falta validar el por que fue el error y mostrarlo en un MESSAGE

    if ($resultado) {
        ?>
        <h3 class="ok"> modificado </h3>
        <?php
    } else {
        ?>
        <h3 class="bad"> HAY UN ERROR </h3>
        <?php
    } 

 }

 ?> 
   

</body>
</html>



