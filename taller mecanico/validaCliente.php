<?php
 session_start();
    include 'conexion.php';
   $correoCliente = $_POST['correo'];
    $tupla=null;
   

$sql = "SELECT * FROM [tallerbd].[tallerbd].[clientetaller] WHERE correo = '$correoCliente'";
$stmt2 = sqlsrv_query( $conn, $sql);
if( $stmt2 === false ) {
die( print_r( sqlsrv_errors(), true));
}
while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ){
    $tupla=$row["correo"];
  
    }
if($tupla!=null){
    header('Location:vehiculo.html');
    $_SESSION["IDcliente"]=$row["correo"];
    die();
}

if($tupla==null){
    header('Location:altaCliente.html');
    die();
}




?>