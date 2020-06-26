<?php
session_start();


    $_SESSION["idR"]=$_GET['id'];
  



?>

<div class="modal-header">
    
    <h4 class="modal-title"><span>cantidad a ordenar de la refaccion</span></h4>
</div>


<form class="needs-validation"  method="POST" action="editaCantidad.php"  >
                  
                      <div class="col-md-6 mb-3">
                        <label for="firstName">Cantidad a agregar</label>
                        <input type="number" class="form-control" id="firstName" placeholder="" name="cant" required>
                        </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                        <button class="btn btn-warning"  type="submit">Confirmar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.href='carrito.php'">Regresar</button>

                        </div>
                    
                </div>
</form>




