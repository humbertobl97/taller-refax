<?php
session_start();
    include 'conexion.php';

    $marcaVehiculo = $_POST['marca'];
    $añoVehiculo = $_POST['año'];
    $modeloVehiculo = $_POST['modelo'];
   
$IDcliente = $_SESSION["IDcliente"];
echo $IDcliente;
$sql1 = "INSERT INTO [tallerbd].[tallerbd].[vehiculo] VALUES (?,?,?,?)";
$params = array($modeloVehiculo,$marcaVehiculo,$añoVehiculo,$IDcliente);
$stmt = sqlsrv_query( $conn, $sql1,$params);
if( $stmt === false ) {
die( print_r( sqlsrv_errors(), true));
}

$sql2 = "SELECT * FROM [tallerbd].[tallerbd].[vehiculo] where idVehiculo = (select max(idVehiculo) from [tallerbd].[tallerbd].[vehiculo]) ";
$stmt2 = sqlsrv_query( $conn, $sql2);
if( $stmt2 === false ) {
die( print_r( sqlsrv_errors(), true));
}
while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ){
  $_SESSION["IDvehiculo"]=$row["idVehiculo"];

  }
header('Location:altaReparacion.html');
die();
       
 
  










?>