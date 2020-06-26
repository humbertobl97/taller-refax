<?php
include 'conexion.php';
$Reparacion=$_GET['id'];


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
    <a class="nav-link" href="#"> Inicio <span class="sr-only">(current)</span></a>
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

  </nav><br>

      <div class="container-fluid">
          <?php
            $sql="SELECT re.imagen, re.nombre, rep.cantidad FROM [tallerbd].[tallerbd].[reparacion_refax] rep, [tallerbd].[tallerbd].[refacciontaller] re where rep.idReparacion=(?) and rep.id_Refaccion=re.idRefaccion";
            $params = array($Reparacion);
            $stmt = sqlsrv_query( $conn, $sql,$params);
            if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
            }
          ?>
          <div class="row">
          <?php   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)):?>
            
  <div class="col-sm-3">
    <div class="card">
    <img src="imagenes/<?php echo $row['imagen'] ?>" alt="" class="img-fluid" style="height:200px">
      <div class="card-body">
        <h5 class="card-title"><?= $row['nombre']?></h5>
        <p class="card-text">se estan usando un total de <?= $row['cantidad'] ?> unidades</p>
        
      </div>
    </div>
          </div>
  <?php endwhile ?>
          </div>
     

</div>