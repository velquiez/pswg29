<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buscar</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php

require('config.php');

$c = $_POST['codigo'];


$sql = "SELECT * FROM producto WHERE codigo=$c";
$result = mysqli_query($conec, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

//Eliminar

$sql2 = "DELETE FROM producto WHERE codigo=$c";

if (mysqli_query($conec, $sql2)) {





?>

<!-- The Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Eliminando datos</h4>
            <button class="close" onclick="location.href='../elimina-produc.html'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
 		<?php
        echo "Registro eliminado satisfactoriamente";
		?>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button class="btn btn-danger" onclick="location.href='../elimina-produc.html'">Cerrar</button>
        </div>
        
        </div>
    </div>



 <?php

} else {




?>

<!-- The Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Error eliminando Datos</h4>
            <button class="close" onclick="location.href='../elimina-produc.html'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
 		<?php
            echo "Error eliminando registro: <br> " . mysqli_error($conn);
		?>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button class="btn btn-danger" onclick="location.href='../elimina-produc.html'">Cerrar</button>
        </div>
        
        </div>
    </div>



<?php


}

//FIN ELIMINAR

        
//$myJSON = json_encode($row);

//echo $myJSON;

    }


} else {


?>

<!-- The Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Error eliminando Datos</h4>
            <button class="close" onclick="location.href='../elimina-produc.html'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
 		<?php
            echo "Ese producto no existe <br> ";
		?>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button class="btn btn-danger" onclick="location.href='../elimina-produc.html'">Cerrar</button>
        </div>
        
        </div>
    </div>



 <?php

}

mysqli_close($conec);
?> 

    <!--Enlace de JS Bootstrap-->
    <script src="javasript/bootstrap.bundle.min.js"></script>

</body>

</html>