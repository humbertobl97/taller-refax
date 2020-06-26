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
   
      </nav><br>

      <div class="container-fluid">
          <?php
            
       

        
            $sql = "SELECT reparacion.idReparacion,reparacion.nombre nombre, reparacion.descripcion, reparacion.fechaInicio, reparacion.costo, vehiculo.marca FROM  [tallerbd].[tallerbd].[reparacion] reparacion ,[tallerbd].[tallerbd].[vehiculo] vehiculo
                  where reparacion.idVehiculo=vehiculo.idVehiculo and reparacion.estatus='activo' ";
            $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            
            while( $reparaciones = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)):?>
                 <div class="row pb-2" style="border-bottom: 1px solid; border-color: black;">
                <div class="col-md-3">
                <img src="imagenes/mec2.jpeg" class="img-fluid">
            

                </div>
        <div class=col-md-9>
            <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 14px;"><?php echo $reparaciones["nombre"] ?> </p>
            <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 14px;">
            <?php echo $reparaciones["descripcion"] ?>
            </p>  
            <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 14px;">
            vehiculo en reparacion: <span > <?php echo $reparaciones["marca"] ?> </span>
            </p> 
            <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 14px;">
            Fecha de Inicio: <span > <?php echo DATE_FORMAT($reparaciones['fechaInicio'], 'd-M-Y') ;  ?> </span>
            </p> 
            <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 12px;">
             Costo: <span > <?php echo $reparaciones["costo"] ?> </span>
            </p> 
            <a data-toggle="modal" href="modalActualizaReparacion.php?id=<?php echo $reparaciones["idReparacion"];?>" data-target="#myModal2" class="btn btn-info">Modificar</a> <a  href="refaccionesUsadas.php?id=<?php echo $reparaciones["idReparacion"];?>"  class="btn btn-warning">Ver refacciones usadas</a>  </button>   </button> <a data-toggle="modal" href="FacturaCliente.php?id=<?php echo $reparaciones["idReparacion"];?>" data-target="#myModal2" class="btn btn-danger">Terminar reparacion</a></button> 


        </div>
      </div>
            
                <?php endwhile ?>

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>


        
          
     
      </div>
