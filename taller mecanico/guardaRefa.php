<?php
include 'conexion.php';
    $nombreRefa = $_POST['nombreR'];
    $descripcionRefa = $_POST['descripcionR'];
    $costocompra = $_POST['preciocompra'];
    $costoventa = $_POST['precioventa'];
    $existencia = $_POST['cantidadR'];
    $imagen = $_POST['imagenR'];
    $categoria = $_POST['categoriaR'];
 

    $sql = "INSERT INTO [tallerbd].[tallerbd].[refacciontaller]  VALUES (?,?,?,?,?,?,?,'a')";
    $params = array($nombreRefa,$descripcionRefa,$costocompra, $costoventa, $existencia, $imagen, $categoria);
$stmt = sqlsrv_query( $conn, $sql,$params);
if( $stmt === false ) {
die( print_r( sqlsrv_errors(), true));
}
  
    
    header('Location:index.html');
    die();
    

?>