<?php
include("con_db.php");

$cod_computador=$_POST['cod_computador'];
$sede=$_POST['sede'];
$sala=$_POST['sala'];
$sw=true;
    $sql="SELECT *  FROM computador WHERE cod_computador='$cod_computador'";
    $query=mysqli_query($conex,$sql);
    while($row=mysqli_fetch_array($query)){
             
             if($row['cod_computador']==$cod_computador){
             	$sw=false;
             }                          
                 
             }


 if($sw){
              	
    if($sede|="" && $sala!=""){
	$guery="SELECT * FROM sedes WHERE cod_sede='$sede' ";
	$resultado=mysqli_query($conex, $guery) ;
	$row=$resultad->fetch_assoc();

	$consulta = "SELECT * FROM  salas WHERE cod_sala='$cod_sala'";
    $resultado = mysqli_query($conex, $consulta);
  	$row2=$resultado->fetch_assoc();
  
  if ($resultad&&$resultado){
  	$sql="INSERT INTO computador VALUES('$cod_computador','$sede','$sala')";
	$query= mysqli_query($conex,$sql);

	if($query){
    	Header("Location: computadores.php");
    
	}else {
		
	}
     
  }     



}else{
	$sql="INSERT INTO computador VALUES('$cod_computador','sin asignar','sin asignar')";
	$query= mysqli_query($conex,$sql);

	if($query){
    	Header("Location: computadores.php");
    
	}else {
		
	}

}
                  }else{
                  	
                  	echo " codigo computador ya existe";
                  }





?>