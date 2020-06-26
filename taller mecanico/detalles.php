<?php
include 'conexion.php';

$sql = "SELECT * FROM refaccion";
$result = mysqli_query($conn, $sql);
$tuplas = mysqli_num_rows($result);
$paginas = $tuplas/3;
$refaSeleccionada = $_GET['idRefa'];
$lista = array();


$sql = "SELECT * FROM refaccion WHERE idRefaccion = $refaSeleccionada";
$consulta = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($consulta)) {
    echo $row["nombre"];
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <td> <button type="button" class="btn btn-outline-primary"  onclick="location.href='detalles.php?idRefa=<?php echo $refas['idRefaccion'] ?>'">Ordenar</button>    </td>
</head>
<body>
    
</body>
</html>