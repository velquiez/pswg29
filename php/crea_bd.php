<?php
$server_name = "127.0.0.1";
$user_name = "root";
$clave = "12345678";

//Se crea la conexión
$conec = mysqli_connect($server_name, $user_name, $clave);

//Valida conexión
if(!$conec){
    die("Error al conectar: " . mysqli_connect_error());
}

//Se crea BD
$sql = "CREATE DATABASE bdunad29";
if(mysqli_query($conec, $sql)){

?>

<div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Vamos bien!</h4>
        <button class="close" onclick="location.href='../administrador.html'">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
      Se creó la Base de Datos: BDUNAD29.
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-danger" onclick="location.href='../administrador.html'">Cerrar</button>
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
          <h4 class="modal-title">Error</h4>
          <button class="close" onclick="location.href='../administrador.html'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php
          echo "Error al crear la BD solicitada: <br>" . $sql . "<br>" . mysqli_error($conec);
          ?> 

        </div>   
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../administrador.html'">Cerrar</button>
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