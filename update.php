<?php

include("con_db.php");
$cod_computador=$_POST['cod_computador'];
$sede=$_POST['sede'];
$sala=$_POST['sala'];


$sql="UPDATE computador SET  sede='$sede',sala='$sala' WHERE cod_computador='$cod_computador'";
$query=mysqli_query($conex,$sql);

    if($query){
        Header("Location: computadores.php");
    }
?>