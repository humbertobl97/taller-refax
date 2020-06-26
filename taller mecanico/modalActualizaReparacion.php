<?php



  



?>

<div class="modal-header">
    
    <h4 class="modal-title"><span>cantidad a ordenar de la refaccion</span></h4>
</div>
                  
<div class="col-md-12 " style="background-color: white;">
                <h3>ACTUALIZACION DE REPARACION</h3>
                  <form class="needs-validation" action="ActualizaReparacion.php" method="POST">
                    <div class="mb-3">
                        <label for="nombreR">nombre de reparacion <?php echo $_GET['id']?> </label>
                        <input type="text" class="form-control" id="nombreR" name="nombre"  >
                       
                      </div>

                      <div class="mb-3">
                        <label for="fechaI">Fecha de Inicio </label>
                        <input type="date" class="form-control" id="fechaI" name="fechainicio"  >
                       
                      </div>
                    


                    <div class="mb-3">
                        <label for="Costo">Costo de la reparacion </label>
                        <input type="text" class="form-control" id="Costo" name="costo"  >
                       
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1">Descripcion de la reparacion</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="descripcion"></textarea>
                       
                      </div>

                      
        
                    
                    <hr class="mb-4 " >
                    <button class="btn btn-primary "  type="submit">Siguiente</button>



