<?php
include("con_db.php");

$cod_computador=$_GET['id'];

$sql="DELETE FROM computador  WHERE cod_computador='$cod_computador'";
$query=mysqli_query($conex,$sql);

    if($query){
        Header("Location: computadores.php");
    }
?>
