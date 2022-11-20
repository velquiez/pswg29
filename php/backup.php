<!DOCTYPE html>
<html lang="es">
<head>
  <title>Backup</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>




<?php
// variables

date_default_timezone_set("America/Bogota");

require('config.php');



//Para utilizar Mysqldump y realizar el respaldo, se debe declarar una variable haciendo referencia a la ubicacion del archivo mysqldump.exe
$mysqldump='"../../../MySQL/bin/mysqldump.exe"';
$backup_file = '"../backups/"'.$bd. "-" .date("Y-m-d-H-i-s"). ".sql";
system("$mysqldump --no-defaults -u $user_name -p$clave $bd > $backup_file",$output);


//var_dump($output);  //para mostrar el resultado de la operación, 0 satisfactoria, 1 error en path, 2 error en conexión a base de datos


switch($output){
case 0:


?>

<!-- The Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Excelente</h4>
          <button class="close" onclick="location.href='../administrador.html'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
    <?php
        echo 'La base de datos <b>' .$bd .'</b> se ha almacenado correctamente en la siguiente ruta '.getcwd().'/' .$backup_file .'</b>';
    ?>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../administrador.html'">Cerrar</button>
        </div>
        
      </div>
    </div>



 <?php

break;
case 1:


?>

<!-- The Modal -->
  
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
        echo 'Se ha producido un error al exportar <b>' .$bd .'</b> a '.getcwd().'/ verifique la siguiente ruta: ' .$backup_file .'</b>';
    ?>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../administrador.html'">Cerrar</button>
        </div>
        
      </div>
    </div>



 <?php



break;
case 2:

?>

<!-- The Modal -->
  
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
        echo 'Se ha producido un error de exportación, compruebe la siguiente información: <br/><br/><table><tr><td>Nombre de la base de datos:</td><td><b>' .$bd .'</b></td></tr><tr><td>Nombre de usuario MySQL:</td><td><b>' .$user_name .'</b></td></tr><tr><td>Contraseña MySQL:</td><td><b> '.$clave.' </b></td></tr><tr><td>Nombre de host MySQL:</td><td><b>' .$server_name .'</b></td></tr></table>';
    ?>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../administrador.html'">Cerrar</button>
        </div>
        
      </div>
    </div>



 <?php


break;
}


mysqli_close($conec);
?>



</BODY>
</HTML>
