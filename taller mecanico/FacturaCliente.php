<?php
session_start();
include 'conexion.php';
$reparacion=$_GET['id'];
$sql="INSERT INTO [tallerbd].[facturacilentetaller](fechaEmision,idReparacion,idEmpleado) values(?,?,2)";
$params = array($fecha,$reparacion);
$stmt = sqlsrv_query( $conn, $sql,$params);
if( $stmt === false ) {
die( print_r( sqlsrv_errors(), true));
}

$_SESSION["ReparacionEliminar"]=$_GET['id'];

$sql = "SELECT f.idFactura, c.nombre nc, c.estado, c.telefono, r.nombre,r.costo, r.descripcion FROM [tallerbd].[facturacilentetaller] f, [tallerbd].[tallerbd].[reparacion] r,[tallerbd].[tallerbd].[clientetaller] c,[tallerbd].[tallerbd].[vehiculo] ve
         Where r.idReparacion=(?) and r.idReparacion=f.idReparacion and r.idVehiculo=ve.idVehiculo and ve.correo = c.correo ";
$parametros=array($reparacion);      
$stmt2 = sqlsrv_query( $conn,$sql,$parametros );
if( $stmt2 === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) {
    $factura=$row['idFactura'];
    $cliente=$row['nc'];
    $estado=$row['estado'];
    $telefono=$row['telefono'];
    $reparacionN=$row['nombre'];
    $descripcion=$row['descripcion'];
    $costo=$row['costo'];

    
}
    
?>






<div class="modal-header">
    
    <h2 class="modal-title"><span>Factura a Cliente</span></h2>
</div>
<div class="container">
    <div class="row">
        <div class=col-md-12>
                <p><?php $factura?></p>
                <div class="row">
                <h5 ><span>Datos cliente</span></h5>
                </div>
                <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 14px;"><?php echo $cliente ?></p>
                <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 14px;"><?php echo $estado?></p>
                <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 14px;"><?php echo $telefono ?></p>
        </div>
        </div>
        <div class="row ">
                <h5><span>Datos de reaparacion</span></h5>
                </div>
                
                <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 14px;"><? echo $reparacionN ?></p>
                <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 14px;"><?php echo $descripcion?></p>
                
                <div class="row pb-2" style="border-top: 1px solid; border-color: black;">
                <div clas="col-md-12">
            <p style="word-wrap:break-word; color:#1B76C1 ; font-size: 14px;">el costo de la reparacion fue $  <span><?php echo $costo?></span></p>
        </div>
</div>
       
        <div class="col-md-12">
        <button class="btn btn-danger "  type="button" window.location.href=''>Siguiente</button>

        </div>

        <?php 
         $sql1 = "UPDATE [tallerbd].[tallerbd].[reparacion] SET estatus='terminado' WHERE idReparacion = (?) ";  
         $params=array($reparacion);
         if (sqlsrv_query($conn, $sql1,$params)) {  
           echo "";
       } else {  
       echo "Error in statement execution.\n";  
       die(print_r(sqlsrv_errors(), true));  
       } 
        ?>
   
</div>
                  



