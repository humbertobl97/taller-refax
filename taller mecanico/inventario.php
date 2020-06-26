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
   
      </nav> <br> <br>
    <div>
        <?php
       

        
       
        $sql = "SELECT * FROM [tallerbd].[tallerbd].[refacciontaller]";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
      

        ?>



    <table class="table table-dark table-hover">
  <thead>
    <tr >
      <th scope="col">Refa</th>
      <th scope="col">categoria</th>
      <th scope="col">existencia</th>
      <th scope="col">imagen</th>
    </tr>
</thead>
    <tbody>
        <?php while( $refas = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)):?>
    
            <tr>
                <th scope="row"> <?php echo $refas["nombre"] ?> </th>
                <td> <?php echo $refas["categoria"] ?> </td>
                <td> <?php echo $refas["existencia"] ?> </td> 
                <td> <img src="imagenes/<?php echo $refas['imagen'] ?>" alt="" class="img-fluid" style="width:100px"> </td>
               
            </tr>
            <?php endwhile ?>
    </tbody>
        </table>
      
    
    <br>
       
    </div>
</body>
</html>