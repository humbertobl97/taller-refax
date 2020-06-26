<?php
session_start();
    include 'conexion.php';
    $nombreCliente = $_POST['nombre'];
    $apellidosCliente = $_POST['apellidos'];
    $correoCliente = $_POST['correo'];
    $telefonoCliente = $_POST['telefono'];
    $estadoCliente = $_POST['estado'];
    $ciudadCliente = $_POST['ciudad'];
    $edadCliente = $_POST['edad'];
    $calleCliente = $_POST['calle'];
    $numeroCliente = $_POST['numero'];
    $postalCliente = $_POST['cp'];

    $sql = "INSERT INTO [tallerbd].[tallerbd].[clientetaller]  VALUES (?,?,?,?,?,?,?,?,?,?,'a')";
    $params = array($correoCliente,$nombreCliente,$apellidosCliente, $telefonoCliente, $edadCliente, $estadoCliente, $ciudadCliente,$calleCliente,$numeroCliente,$postalCliente);
$stmt = sqlsrv_query( $conn, $sql,$params);
if( $stmt === false ) {
die( print_r( sqlsrv_errors(), true));
}
  
    $_SESSION["IDcliente"]=$correoCliente;
    header('Location:vehiculo.html');
    die();
    

?>