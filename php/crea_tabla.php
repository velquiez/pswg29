<?php
$server_name = "localhost";
$user_name = "root";
$clave = "12345678";
$bd = "bdunad29";

//Se crea la conexión
$conec = mysqli_connect($server_name, $user_name, $clave, $bd);

//Valida conexión
if(!$conec){
    die("Error al conectar: " . mysqli_connect_error());
}

//Se crea tabla en la BDunad29
$sql = "CREATE TABLE producto (
codigo int(10) PRIMARY KEY,
nom_produc varchar(50),
marca varchar(30),
precio float(8,2),
cantidad int(8)
)";



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
      Fue creada con éxito la tabla: "producto" en BD.
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
          echo "Error al crear la tabla solicitada: <br>" . $sql . "<br>" . mysqli_error($conec);
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