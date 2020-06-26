<?php
session_start();
    include 'conexion.php';
    $idrefaccion=$_SESSION["idR"];
    $cantidad=$_POST["cant"];
    

    $sql1 = "UPDATE [192.168.196.228].[bdsistemarefax].[dbo].[refaccion_pedidotaller] SET cantidad = (?) WHERE id_refaccion = (?) ";
    $params = array($cantidad, $idrefaccion);  
    if (sqlsrv_query($conn, $sql1, $params)) {  
      header('Location:carrito.php');
  } else {  
  echo "Error in statement execution.\n";  
  die(print_r(sqlsrv_errors(), true));  
  } 
    
  

 

  


    ?>