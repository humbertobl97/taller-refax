<?php
session_start();
    include 'conexion.php';

    
    
    $sql="SELECT *FROM  [tallerbd].[tallerbd].[refacciontaller]" ;
            $stmt = sqlsrv_query( $conn, $sql);
            if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
            }
    

    function agregarRefas(){
        include 'conexion.php';
        $refaccion = $_POST['refaSeleccionada']; 
        $cantidadRefas = $_POST['cantidad'];
        $sql2 = "SELECT * FROM [tallerbd].[tallerbd].[reparacion] where idReparacion = (select max(idReparacion) from [tallerbd].[tallerbd].[reparacion]) ";
        $stmt = sqlsrv_query( $conn, $sql2);
            if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
            }
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
                $idReparacion = $row["idReparacion"];

            }
       
        
        $sql1 = "INSERT INTO [tallerbd].[tallerbd].[reparacion_refax] VALUES (?,?,?)";
        $params = array($idReparacion,$cantidadRefas,$refaccion);
$stmt = sqlsrv_query( $conn, $sql1,$params);
if( $stmt === false ) {
die( print_r( sqlsrv_errors(), true));
}

        
       
       
        
    }

    
    session_unset();
    session_destroy();
    
?>














<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body style="background-color:  #EFF4F7;">
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
        <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
   
      </nav>
    <div class="container">
        <div class="row">
           
            <div class="col-md-12 " style="background-color: white;">
                <h3>Agrega las refacciones que se usaran en la reparacion</h3>
                <form class="needs-validation"  method="POST">
                    <div class=row>
                    <div class= "col-md-10 mt-1 ">
                <input list="refacciones" name="refaSeleccionada" style="width:800px" >
                    <datalist id="refacciones">
                        <?php while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)):?>
                            <option value="<?= $row["idRefaccion"] ?>"> <?=$row["nombre"]?> </option>
                        <?php endwhile ?>
                       
                    </datalist>

                </div>

                <div class="col-md-2 ">
            <input type="number" class="form-control" id="cant" placeholder="cantidad" name="cantidad"  >
                </div>

                    </div>

                    <div class="col-md-6">
                    <button type="submit" class="btn btn-primary " name="agregaRefas"  >Agregar refaccion</button>
                    <button  class="btn btn-warning "onclick="location.href='index.php'" type="button">Finalizar</button>

                    <?php 
                          if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['agregaRefas']))
                          {
                              agregarRefas();
                          }

                        
                    ?>
                    </div>
                    
                   
                
                    
                    
            </form>

            </div>
        </div>
    </div>
    
</body>
</html>