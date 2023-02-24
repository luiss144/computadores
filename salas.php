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
    <title>Salas</title>
</head>
<body>
    <div >

<!-- Formulario con metodo POST para la captura de datos y los input con REQUIRED para validar que ningun campo este vacio -->

    <form method="post">
        
        <h1>SALAS</h1><br>

        
        
        <input type="submit" value="REGISTRAR SALAS" name="register_SALAS"><br>
         <input type="submit" value="MOSTRAR SALAS" name="mostrar_SALAS"><br>
         
        
    </form>
    
</div>

<!-- se llama la clase registrar para que capture todos los datos en los input cuando se presione el input SUBMIT -->
   <?php

include("con_db.php");

if (isset($_POST['register_SALAS'])) {
?>


<!-- Formulario con metodo POST para la captura de datos y los input con REQUIRED para validar que ningun campo este vacio -->

    <form method="post">
        
        <h1>Registro SALAS</h1><br>

        <label for=""> Codigo Sala</label>
        <input type="text" name="codigo_sala" placeholder="Codigo Sala" required><br>
        <label for=""> Codigo Sede</label>
        <input type="text" name="codigo_sede_sala" placeholder="codigo sede" required><br>
        
        <label for=""> Cantidad Max de computadores</label>
        <input type="number" name="cantidad_max_pc" placeholder="Cantidad Max de computadores" required><br>

        <!-- este input es el que manda toda la informacion a la base de datos -->
        
        <input type="submit" value="REGISTRAR" name="register"><br>


    </form>
    



<?php

}
if (isset($_POST['mostrar_SALAS'])) {
?>
<div>
<form method="post" class="CAL">
<label for="">Escriba codigo sala</label>

<input type="text" name="cod_sala" placeholder="codigo sala" required><br>

<label for="">Escriba codigo sede</label>

<input type="text" name="cod_SEDE" placeholder="codigo sede" required><br>

 <input type="submit" value="modificar" name="modificar_SALAS"><br>
<input type="submit" value="eliminar" name="eliminar_SALAS"><br>
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
$guery="SELECT * FROM salas";
$resultado=mysqli_query($conex, $guery) ;
while( $i=$resultado->fetch_assoc()){
?>
  <tr>	
   <td><?php echo $i['cod_sala'];?></td>
   <td><?php echo $i['cod_sede_sala'];?></td>
   <td><?php echo $i['cant_pc_salas'];?></td>
   <td><?php echo $i['cant_max_pc'];?></td>
   
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
if (isset($_POST['eliminar_SALAS'])) {
 $cod_sala= trim ($_POST['cod_sala']);
 $cod_sedes= trim ($_POST['cod_SEDE']);

    $consulta = "DELETE FROM  salas WHERE cod_sala='$cod_sala' and cod_sede_sala= '$cod_sedes' ";
    $resultado = mysqli_query($conex, $consulta);
   
   $guery="SELECT * FROM sedes";
   $resultad=mysqli_query($conex, $guery);
   
   while( $i=$resultad->fetch_assoc()){
  if($cod_sedes==$i['Codigo_sede']){
      $canti=$i['Cantidad_salas']-1;
    $consult =" UPDATE sedes SET Cantidad_salas='$canti' WHERE Codigo_sede='$cod_sedes'";
    $resulta = mysqli_query($conex, $consult); 

}
}
    //SI en cadena para mensajes de que el registro haya sido exitoso o haya fracasado 
    //Falta validar el por que fue el error y mostrarlo en un MESSAGE

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
 


   
if (isset($_POST['modificar_SALAS'])) {
$cod_sala= trim ($_POST['cod_sala']);
$cod_sedes= trim ($_POST['cod_SEDE']);
$consulta = "SELECT * FROM  salas WHERE cod_sala='$cod_sala' AND cod_sede_sala= '$cod_sedes' ";
    $resultado = mysqli_query($conex, $consulta);
  $row=$resultado->fetch_assoc();
?>
<form method="post">
        
        <h1>Modificar Salas</h1><br>

        <label for="">Codigo de sala</label>
        <input type="text" name="cod_sala" placeholder="Nombre sede" value=<?php echo $row['cod_sala'];?> readonly onmousedown="return false;"><br>
        <label for=""> Codigo sede</label>
        <input type="text" name="cod_sede_sala" placeholder="codigo sede" value=<?php echo $row['cod_sede_sala'];?> readonly onmousedown="return false;"><br>
        <label for=""> Cantidad maximo de pc</label>
        <input type="number" name="cant_max_pc" placeholder="Cantidad maxima" value=<?php echo $row['cant_max_pc'];?> required><br>
        <td><input type="submit" value="modificar" name="modificar"><br></td>

    </form>

<?php
}   
if (isset($_POST['register'])) {

include("con_db.php");
    $codi_sala = trim($_POST['codigo_sala']);
    $codi_sede_sala = trim($_POST['codigo_sede_sala']);
    $canti_pc_salas = 0;
    $canti_max_pc = trim($_POST['cantidad_max_pc']);
    $validacion=true;
    $guery="SELECT * FROM sedes";
$resultad=mysqli_query($conex, $guery) ;
$resultado=false;
while( $i=$resultad->fetch_assoc()){
  if($codi_sede_sala==$i['Codigo_sede']){
    $guery="SELECT * FROM salas WHERE cod_sede_sala='$codi_sede_sala'";
    $resul=mysqli_query($conex, $guery) ;
while( $F=$resul->fetch_assoc()){
       if($codi_sala==$F['cod_sala']){
        $validacion=false;
       }

}

if($validacion){

        //esta  dos lineas de codigo insertan los datos en la base de datos
        $consulta = "INSERT INTO salas ( cod_sala,cod_sede_sala, cant_pc_salas , cant_max_pc ) VALUES ('$codi_sala', '$codi_sede_sala', '$canti_pc_salas', '$canti_max_pc')";
    $resultado = mysqli_query($conex, $consulta);

   $canti=$i['Cantidad_salas']+1;
    $consult =" UPDATE sedes SET Cantidad_Salas='$canti' WHERE Codigo_sede='$codi_sede_sala'";
    $resulta = mysqli_query($conex, $consult);
    
}else{
    echo " NO PUEDE EXISTER DOS CODIGO DE SALAS IDENTICO EN LA MISMA SEDE";
}

   
    }

}
  

    //SI en cadena para mensajes de que el registro haya sido exitoso o haya fracasado 
    //Falta validar el por que fue el error y mostrarlo en un MESSAGE

    
    if ($resultado) {
        ?>
        <h3 class="ok"> TE HAS REGISTRADO </h3>
        <?php
    } else {
        echo" NO EXISTE SEDE";
        ?>
        <h3 class="bad"> HAY UN ERROR </h3>
        <?php
    } 

 }
 if (isset($_POST['modificar'])) {

    $cod_sala = trim($_POST['cod_sala']);
    $cod_sede_sala = trim($_POST['cod_sede_sala']);
    $cant_pc_salas = trim($_POST['cant_pc_salas']);
    $cant_max_pc = trim($_POST['cant_max_pc']);
    
    

    //esta  dos lineas de codigo insertan los datos en la base de datos
  
    
    $consulta =" UPDATE salas SET cod_sede_sala='$cod_sede_sala',cant_pc_salas='$cant_pc_salas',cant_max_pc='$cant_max_pc' WHERE cod_sala='$cod_sala'";
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



