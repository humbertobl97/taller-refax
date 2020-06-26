<?php
session_start();
include 'conexion.php';

/*$sql = "SELECT * FROM refaccion";
$result = mysqli_query($conn, $sql);
$tuplas = mysqli_num_rows($result);
$paginas = $tuplas/3;
$refaSeleccionada="tttta";
$a=1;
echo $tuplas;
*/

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
   
      </nav>

    <div>
        <?php
      //  if(!$_GET['pagina']){
        //    header('Location:simularPedido.php?pagina=1');
        //}

        //$iniciar= ($_GET['pagina']-1)*3;
        //$sql = "SELECT * FROM refaccion LIMIT $iniciar,3";
        //$consulta = mysqli_query($conn, $sql);
       // mysqli_fetch_all($consulta, MYSQLI_ASSOC);
        ?>

    <?php
       

        if($_GET){
            $refaccionNombre=$_GET["refa"];
            $sql = "SELECT * FROM [192.168.196.228].[bdsistemarefax].[dbo].[refaccion] where categoria=(?) ";
            $params=array($refaccionNombre);
            $stmt = sqlsrv_query( $conn, $sql,$params );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            
        }

        if(!$_GET){
            $sql = "SELECT * FROM [192.168.196.228].[bdsistemarefax].[dbo].[refaccion] ";
             $stmt = sqlsrv_query( $conn, $sql );
             if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }

        }
        
        

        ?>
            


 <div class="container">
 <div class="row">
           
           <div class="col-md-12 " style="background-color: white;">
                 <form class="needs-validation" action="simularPedido.php" method="GET">
                   <div class="row">
                     <div class="col-md-5 mb-3">
                       <input type="text" class="form-control" id="firstName" placeholder="busca refaccion por categoria" name="refa" required>
                       
                     </div>
                     <div class="col-md- mb-3">
                     <button type="submit" class="btn btn-primary mb-2">buscar</button>
                       
                     </div>
                   </div>
    </form>

    <table class="table table-dark table-bordered">
  <thead>
    <tr >
      <th scope="col">Refaccion</th>
      <th scope="col">imagen</th>
      <th scope="col">categoria</th>
      <th scope="col">descripcion</th>
      <th scope="col"></th>
    </tr>
</thead>
    <tbody>
        <?php while( $refas = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)):?>
    
            <tr>
                <th scope="row"> <?php echo $refas["nombre"] ?> </th>
                <td> <img src="imagenes/<?php echo $refas['imagen'] ?>" alt="" class="img-fluid" style="width:100px"> </td>
                <td> <?php echo $refas["categoria"] ?> </td>
                <td> <?php echo  $refas['Descripcion']?>  </td>
                <td> <button type="button" class="btn btn-outline-primary" onclick="location.href='agregaPedido.php?refaccionPedida=<?php echo $refas['id_refaccion'] ?>'"  >Ordenar</button>    </td>
                
            </tr>
            <?php endwhile ?>
    </tbody>
        </table>


 </div>

   

 
      
    
    <br>
        
    </div>
</body>
</html>