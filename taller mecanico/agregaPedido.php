<?php
    include 'conexion.php';
    $refaccionOrdenada = $_GET["refaccionPedida"];
    $nuevo=true;
    $sql = "SELECT  * FROM [192.168.196.228].[bdsistemarefax].[dbo].[pedido_taller]";
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        if($row['fecha']==null){ 
            $nuevo=false;
            pedidoActivo($row["id_pedido"]);
        break;

        }
    }

    function pedidoActivo($IDPEDIDO){
        include 'conexion.php';
        $sql="INSERT INTO [192.168.196.228].[bdsistemarefax].[dbo].[refaccion_pedidotaller](cantidad,id_refaccion,id_pedido) values(1,?,?)";
        $params = array($_GET["refaccionPedida"], $IDPEDIDO);
        $stmt = sqlsrv_query( $conn, $sql,$params);
        if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
}
      

    }

    if($nuevo==true){
        echo $nuevo;
        $RFC='A55F';
        echo"entre a nuevo";
        $sql="INSERT INTO [192.168.196.228].[bdsistemarefax].[dbo].[pedido_taller](rfc_cliente,estatus_pago,status_surtido,total_pagar) values(?,'N','N',500.00)";
    $params = array($RFC);
        $stmt = sqlsrv_query( $conn, $sql,$params);
        if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));

            }

    $sql = "SELECT  * FROM [192.168.196.228].[bdsistemarefax].[dbo].[pedido_taller] WHERE id_pedido = (select max(id_pedido) from [192.168.196.228].[bdsistemarefax].[dbo].[pedido_taller]) " ;
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
    }

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
    echo $row["id_pedido"];
    $sql2="INSERT INTO [192.168.196.228].[bdsistemarefax].[dbo].[refaccion_pedidotaller](cantidad,id_refaccion,id_pedido) values(1,?,?)";
    $params = array($_GET["refaccionPedida"], $row["id_pedido"]);
        $stmt2 = sqlsrv_query( $conn, $sql2,$params);
        if( $stmt2 === false ) {
        die( print_r( sqlsrv_errors(), true));
}
}
    }

    header('Location:index.php');
    die();

    
  
   
?>