<?php
session_start();
include 'conexion.php';

$nombreReparacion = $_POST["nombre"];
$fechaInicio = $_POST["fechainicio"];
$costoReparacion = $_POST["costo"];
$descripcionReparacion = $_POST["descripcion"];
$IDVEHICULO = $_SESSION["IDvehiculo"];

echo $IDVEHICULO;
$sql1 = "INSERT INTO [tallerbd].[tallerbd].[reparacion] (costo, fechaInicio, estatus,descripcion,idVehiculo,nombre) VALUES (?,?,'activo',?,?,?)";
$params = array($costoReparacion,$fechaInicio,$descripcionReparacion,$IDVEHICULO,$nombreReparacion);
$stmt = sqlsrv_query( $conn, $sql1,$params);
if( $stmt === false ) {
die( print_r( sqlsrv_errors(), true));
}

  header('Location:agregarRefacciones.php');


?>