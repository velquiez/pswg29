<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrar</title>

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
    $n = $_POST['nom_produc'];
    $m = $_POST['marca'];
    $p = $_POST['precio'];
    $d = $_POST['cantidad'];

    $sql = "UPDATE producto SET nom_produc='$n', marca='$m', precio='$p', cantidad='$d' WHERE codigo='$c'"; 

    if (mysqli_query($conec, $sql)) {
?>

    <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Vamos bien!</h4>
        <button class="close" onclick="location.href='../actualizar-produc.html'">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        Registro actualizado.
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-danger" onclick="location.href='../actualizar-produc.html'">Cerrar</button>
      </div>
      
    </div>
  </div>

<?php
    }else{
?>
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Algo ha fallado!</h4>
          <button class="close" onclick="location.href='../actualizar-produc.html'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php
          echo "No se ha podido actulizar el producto: <br>" . $sql . "<br>" . mysqli_error($conec);
          ?> 

        </div>   
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../actualizar-produc.html'">Cerrar</button>
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