<?php
include 'conexion.php';
    
$total=0;
$sql = "SELECT r.id_refaccion, r.nombre, r.imagen , r.precio_venta as costo, r.categoria , li.cantidad as cant FROM  [192.168.196.228].[bdsistemarefax].[dbo].[refaccion] r,[192.168.196.228].[bdsistemarefax].[dbo].[refaccion_pedidotaller] li, [192.168.196.228].[bdsistemarefax].[dbo].[pedido_taller] pe where li.id_pedido = pe.id_pedido and pe.fecha is null and li.id_refaccion = r.id_refaccion ";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
  $total = $total + ($row["cant"]*$row["costo"]); 
  $tsql = "UPDATE [192.168.196.228].[bdsistemarefax].[dbo].[pedido_taller]   SET total_pagar = (?)   WHERE estatus_pago = 'N' ";
  
  $params = array($total);  
  if (sqlsrv_query($conn, $tsql, $params)) {  
    echo "";  
} else {  
echo "Error in statement execution.\n";  
die(print_r(sqlsrv_errors(), true));  
} 

}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


  <script src="jquery-3.5.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="imagenes/logo.png" alt="" style="height: 3rem; width: 5rem;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"> Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="inventario.php">Inventario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="simularPedido.php">catalogo refaccionaria</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="altaRefacciones.html">registrar refacciones</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Reparaciones
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="reparacionesActuales.php">reparaciones actuales</a>
          <a class="dropdown-item" href="cliente.html">dar de alta</a>
          
      </li>

     
      
    </ul>
   
      </nav>
    <div class="container">
        

        
    <table class="table ">
  <thead>
    <tr class="table-info ">
      <th scope="col">Refaccion</th>
      <th scope="col">categoria</th>
      <th scope="col">cantidad</th>
      
    </tr>
</thead>
    <tbody class=table-bordered >
      
        <?php 
         $sql = "SELECT r.id_refaccion, r.nombre, r.imagen , r.precio_venta as costo, r.categoria , li.cantidad as cant FROM  [192.168.196.228].[bdsistemarefax].[dbo].[refaccion] r,[192.168.196.228].[bdsistemarefax].[dbo].[refaccion_pedidotaller] li, [192.168.196.228].[bdsistemarefax].[dbo].[pedido_taller] pe where li.id_pedido = pe.id_pedido and pe.fecha is null and li.id_refaccion = r.id_refaccion ";
         $stmt = sqlsrv_query( $conn, $sql );
         if( $stmt === false) {
             die( print_r( sqlsrv_errors(), true) );
         }
        while( $refas = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)):?>
            
            <tr>
                <th scope="row"> <?php echo $refas["nombre"] ?>  <img src="imagenes/<?php echo $refas['imagen'] ?>" alt="" class="img-fluid" style="width:100px"> </th>
                <td> <?php echo $refas["categoria"] ?> </td>
                <td> <?php echo $refas["cant"] ?> <a data-toggle="modal" href="fetch_record.php?id=<?php echo $refas["id_refaccion"];?>" data-target="#myModal" class="btn btn-info">editar cantidad</a> </td> 
                
                
            </tr>
            <?php endwhile ?>
            
            
    </tbody>

    </table>
  

   

  
  
    
    


       


        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>
<form action="finalizaPedido.php">
      <div class="form-group">
        <div class="row">
          <div class="col-md-6">
          <p>total a pagar $ <?php echo $total ?>MXN</p>

          </div>
          <div class="col-md-6">
          <button type="submit" class="btn btn-danger  ">Realizar pedido</button>

          </div>
        
        

        </div>
        
  </div>
  </form>
     
    </div>
</body>
</html>