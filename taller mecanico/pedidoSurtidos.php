<?php

include 'conexion.php';


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

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pedidos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="pedidoSurtidos.php">pedidos surtidos</a>
          <a class="dropdown-item" href="pedidosNosurtidos.php">pedidos no surtidos</a>
          
      </li>

      
      
    </ul>
   
      </nav> <br>

  <div class="container">
  <?php 
      $sql = "SELECT id_pedido, fecha, total_pagar FROM [192.168.196.228].[bdsistemarefax].[dbo].[pedido_taller] where rfc_cliente='A55F' and status_surtido='S' ";
      $stmt = sqlsrv_query( $conn, $sql );
      if( $stmt === false) {
     die( print_r( sqlsrv_errors(), true) );
 }
      ?>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#Pedido</th>
      <th scope="col">Fecha de pedido</th>
      <th scope="col">costo del pedido</th>
      <th scope="col">factura</th>
    </tr>
  </thead>
  <tbody>
  <?php while( $pedidos = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)):?>
    
    <tr>
        <th scope="row"> <?php echo $pedidos["id_pedido"] ?> </th>
        <td> <?php $date=date_create($pedidos["fecha"]); echo date_format($date,"Y/m/d H:i:s") ?> </td>
        <td> <?php echo  $pedidos['total_pagar']?>  </td>
        <td>  <a data-toggle="modal" href="modalFacturaSurtido.php?id=<?php echo $pedidos['id_pedido']?>" data-target="#myModal" class="btn btn-info">Ver Factura</a> </td> 
        
        
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


  </div>
  
    
</body>
</html>