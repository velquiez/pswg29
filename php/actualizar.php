<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>

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
    //muestra registros de cada columna
    while($row = mysqli_fetch_assoc($result)){

?>

<div class="container">
  <h2>Actualizar producto.</h2>
  <form action="actualizar02.php" method="POST">

    <div class="form-group">
      <label>Codigo:</label>
      <input type="text" class="form-control"      
            value=" 
            <?php echo $row['codigo'] ?>"
            id="codigo" placeholder="Digite el código del producto." 
            name="codigo" 
        readonly>
    </div>

    <div class="form-group">
      <label>Nombre_Producto:</label>
      <input type="text" class="form-control" value=" <?php echo $row['nom_produc'] ?> " id="nom_produc" placeholder="Escriba el nombre del producto." name="nom_produc">
    </div>
    <div class="form-group">
      <label>Marca:</label>
      <input type="text" class="form-control" value=" <?php echo $row['marca'] ?> " id="marca" placeholder="Digite la marca del producto." name="marca">
    </div>
    <div class="form-group">
      <label>Precio:</label>
      <input type="text" class="form-control" value=" <?php echo $row['precio'] ?> " id="precio" placeholder="Digite el precio del producto." name="precio">
    </div>
    <div class="form-group">
      <label>Cantidad:</label>
      <input type="text" class="form-control" value=" <?php echo $row['cantidad'] ?> " id="cantidad" placeholder="Ingrese la cantidad del producto." name="cantidad">
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
  </form>
</div>

<?php
    }

    }else{
?>

<div class="modal-dialog">
    <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Producto no encontrado</h4>
          <button class="close" onclick="location.href='../actualizar-produc.html'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
 		<?php
        echo "No se encontró el Producto...imposible actualizar. " . "<br>";
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