<?php
    include 'conexion.php';
    $sql = "SELECT r.id_refaccion, r.nombre, r.imagen , r.precio_venta as costo, r.categoria,r.descripcion , li.cantidad as cant FROM  [192.168.196.228].[bdsistemarefax].[dbo].[refaccion] r,[192.168.196.228].[bdsistemarefax].[dbo].[refaccion_pedidotaller] li, [192.168.196.228].[bdsistemarefax].[dbo].[pedido_taller] pe where li.id_pedido = pe.id_pedido and pe.fecha is null and li.id_refaccion = r.id_refaccion ";
         $stmt = sqlsrv_query( $conn, $sql );
         if( $stmt === false) {
             die( print_r( sqlsrv_errors(), true) );
         }
        while( $refas = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
            $sql2 = "SELECT * FROM [tallerbd].[tallerbd].[refacciontaller] where nombre=(?)";
            $params=array($refas['nombre']);
            $stmt2 = sqlsrv_query( $conn, $sql2,$params );
         if( $stmt2 === false) {
             die( print_r( sqlsrv_errors(), true) );
         }
         while( $refacciones = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC)){
             if($refacciones==null){
                 $sql3="INSERT INTO [tallerbd].[tallerbd].[refacciontaller] (nombre, categoria, descripcion,imagen,existencia) values(?,?,?,?)";
                 $params2=array($refas['nombre'], $refas['categoria'], $refas['descripcion'], $refas['imagen'],$refas['cantidad']);
                 $stmt3 = sqlsrv_query( $conn, $sql3, $params2 );
              if( $stm3 === false) {
                  die( print_r( sqlsrv_errors(), true) );
              }
             }
             else{
                $sql4 = "UPDATE [tallerbd].[tallerbd].[refacciontaller]  SET existencia = (?) WHERE nombre = (?) ";  
                $c1=$refacciones['existencia'];
                $c2=$refas['cantidad'];
                $cant=$c1+$c2;
                $params4=array($cant, $refas['nombre']);
                if (sqlsrv_query($conn, $sql4,$params4)) {  
                  echo"";;
              } else {  
              echo "Error in statement execution.\n";  
              die(print_r(sqlsrv_errors(), true));  

             }
         }
        }
    }


   
    $sql1 = "UPDATE [192.168.196.228].[bdsistemarefax].[dbo].[pedido_taller] SET fecha=(?) WHERE fecha is null ";  
    $params =array($fecha);
    if (sqlsrv_query($conn, $sql1, $params)) {  
      header('Location:index.php');
  } else {  
  echo "Error in statement execution.\n";  
  die(print_r(sqlsrv_errors(), true));  
  } 



    
  
   
?>