<?php
include 'conexion.php';
$factura=$_GET['id'];
$sql = "SELECT factura.idFactura,factura.costo_surtido, refa.nombre, refa.categoria,refa.imagen, refax.cantidad
from [192.168.196.228].[bdsistemarefax].[dbo].[pedido_taller] pedido, [192.168.196.228].[bdsistemarefax].[dbo].[factura_pedido] factura,
[192.168.196.228].[bdsistemarefax].[dbo].[refaccion] refa, [192.168.196.228].[bdsistemarefax].[dbo].[refaccion_pedidotaller] refax
where factura.id_pedido=(?) and factura.id_pedido=pedido.id_pedido and pedido.id_pedido=refax.id_pedido and refax.id_refaccion=refa.id_refaccion";
      $params=array($factura);
      $stmt = sqlsrv_query( $conn, $sql,$params );
      if( $stmt === false) {
     die( print_r( sqlsrv_errors(), true) );
 }

 while( $factura = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
     $costoSurtido=$factura['costo_surtido'];
 }





?>

<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Factura de pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4>datos de factura</h4>
          <p>Numero de factura  <span><?php echo $factura?></span></p>
          <p>costo de surtido $<span><?php echo$costoSurtido?></span></p>
          <h4 >Refacciones surtidas</h4>
          <table class="table">
            <thead class="thead-dark">
             <tr>
             <th scope="col">Refaccion surtida</th>
              <th scope="col">categoria</th>
              <th scope="col">cantidad surtida</th>
     </tr>
  </thead>
  <tbody>
  <?php while( $factura = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)):?>
    <tr>
        <th scope="row"> <?php echo $factura["nombre"] ?>  </th>
        <td> <?php echo $factura['categoria'] ?> </td>
        <td> <?php echo  $factura['cantidad']?>  </td>
        
        
    </tr>
    <?php endwhile ?>
  </tbody>
</table>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>