<?php
session_start();
    include 'conexion.php';
    $idrefaccion=$_SESSION["ReparacionActualizar"];
    $nombre=$_POST["nombre"];
    $inicio=$_POST["fechainicio"];
    $costo=$_POST["costo"];
    $describe=$_POST["descripcion"];
    

    $sql1 = "UPDATE [tallerbd].[reparacion] SET nombre=(?),fechaInicio=(?),costo=(?),descripcion = (?) WHERE idReparacion = (?) ";
    $params = array($nombre, $inicio, $costo, $describe, $idrefaccion);  
    if (sqlsrv_query($conn, $sql1, $params)) {  
      header('Location:carrito.php');
  } else {  
  echo "Error in statement execution.\n";  
  die(print_r(sqlsrv_errors(), true));  
  } 
  ?>