<?php

include 'conexion.php';
$i=0;

$sql = "SELECT  li.cantidad FROM  [192.168.196.228].[bdsistemarefax].[dbo].[refaccion] r,[192.168.196.228].[bdsistemarefax].[dbo].[refaccion_pedidotaller] li, [192.168.196.228].[bdsistemarefax].[dbo].[pedido_taller] pe where li.id_pedido = pe.id_pedido and pe.fecha is null and li.id_refaccion = r.id_refaccion ";
$stmt = sqlsrv_query( $conn, $sql);
         if( $stmt === false) {
             die( print_r( sqlsrv_errors(), true) );
         }
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
             $i++;
         }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

      <li class="nav-item">
        <a class="nav-link" href="carrito.php"><i class="fas fa-shopping-cart"></i><span><?php echo $i ?></span></a>
      </li>
      
    </ul>
   
      </nav>

      <header class="principal">
       
    </header>

    <div class="container-fluid">
        <div class="row justify-content-center   " style="background-color: #EFF4F7;">
            <div class="col-md-12 mt-5  text-center">
                <h1 style="color: #05568C;">Nuestras reparaciones mas demandadas por clientes </h2>

            </div>
            
            <div class="col-md-3 mt-5 ml-5   " style="background-color: white; ">
            <i class="fas fa-tools"></i><br>
                <h2 style="color: #032F53;">cambio de llantas y ajuste de ruedas </h2>
                <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 1.5rem;">
                Las llantas son uno de los componentes más importantes de tu coche y al mismo tiempo son de las partes más ignoradas. Conocerlas y aprender a identificar su estado de desgaste no te toma más de un minuto y puede ser la diferencia en un momento inesperado.
                </p>

            </div>
            <div class="col-md-3 ml-5 mt-5 " style="background-color: white; ">
            <i class="fas fa-tools"></i><br>
                <h2 style="color: #032F53;"> Reparacion de bujias </h2>
                <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 1.5rem;">una de nuestras grandes especialidades la reparacion de bujias
                A veces se tienen problemas para arrancar el automóvil y este puede ser culpa por una terminal de la batería del coche
                </p>

            </div>
            <div class="col-md-3 ml-5 mt-5  " style="background-color: white; ">
            <i class="fas fa-tools"></i><br>
                <h2 style="color: #032F53;">reparacion de motor </h2>
                <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 1.5rem;">
                Básicamente es el corazón de nuestro auto, por lo que, si la afectación es de gran magnitud, debes de estar consciente que no cualquiera te lo dejará como nuevo.
                 Existen motores sencillos y entre más cilindros tenga, más caros serán. Si el motor de tu auto es sobrealimentado, déjanos decirte que esto será la peor reparación.
                </p>

            </div>

            <div class="col-md-3 mt-5 ml-5   " style="background-color: white; ">
            <i class="fas fa-tools"></i><br>
                <h2 style="color: #032F53;">Suspension y direccion </h2>
                <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 1.5rem;">
                La suspensión y dirección de un vehículo, al igual que el motor, es de lo más importante y costoso de reparar. Estos dos elementos son los responsables de dar estabilidad, comodidad y desempeño al momento de manejar. Una suspensión de doble horquilla te costará el doble que una tradicional, pero es mucho más caro reparar una suspensión magnética que una regular.
                </p>

            </div>
            <div class="col-md-3 ml-5 mt-5 " style="background-color: white; ">
            <i class="fas fa-tools"></i><br>
                <h2 style="color: #032F53;">caja de cambios </h2>
                <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 1.5rem;">Una de las reparaciones más temidas es la que tiene que ver con la caja de cambios. Los autos automáticos sufren un poco más de esta situación. Sin embargo, si eres precavido y notas que la caja comienza a tener dificultades cuando aceleras o frenas, acude al mecánico en cuanto antes.

            </div>
            <div class="col-md-3 ml-5 mt-5  " style="background-color: white; ">
            <i class="fas fa-tools"></i><br>
                <h2 style="color: #032F53;">inyectores de combustible </h2>
                <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 1.5rem;">Si notas que el consumo de tu gasolina es excesivo o el arranque del motor es deficiente, lo más probable es que los inyectores del combustible estén fallando. Es recomendables cambiar los inyectores cada determinado tiempo para evitar una reparación costo que afecte más elementos del auto. 
                </p>

            </div>

            <div class="col-md-3 mt-5">
                <img src="imagenes/mec1.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-md-3 mt-5">
                <img src="imagenes/mec2.jpeg" class="img-fluid" alt="">
            </div>
            <div class="col-md-3 mt-5">
                <img src="imagenes/mec3.jpg" class="img-fluid" alt="" >
            </div>
            <div class="col-md-3 mt-5">
                <img src="imagenes/mec4.jpg" class="img-fluid" alt="">
            </div>
            

            <div class="col-md-12 text-center" style="margin-top: 15rem;" >
                <h1 style="color: #05568C;"> reparaciones en proceso </h2>
            </div>

            <div class="col-md-6 mt-5">
                <p style="word-wrap:break-word;  ; font-size: 1.5rem;">
                    Observa a detalle las reparaciones que se encuentran en proceso o aun no terminadas en el taller
                    y en caso de finalizar alguna reparacion tendras la opcion de darla por finalizada y asi llevar 
                    un control mas ordenado de los vehiculos que actualmente se encuentran en reparacion en el taller
                </p><br>
                <p style="word-wrap:break-word;  ; font-size: 1.5rem; color:#1B76C1">
                    Vehiculo en reparacion <br> cliente del vehiculo <br> fecha de inicio <br> refacciones usadas
                </p>
                <br>
                <button type="button" class="btn btn-danger" style="height: 4rem;">Ver reparaciones actuales</button>
            </div>

            <div class="col-md-6 mt-5 text-center">
                <img src="reparacion1.jpg" alt="" class="img-fluid">
            </div>

            

            </div>
            

            
        </div>
    </div>
     
</body>
</html>