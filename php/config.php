<?php
$server_name = "127.0.0.1";
$user_name = "root";
$clave = "12345678";
$bd = "bdunad29";

//Se crea la conexión
$conec = mysqli_connect($server_name, $user_name, $clave, $bd);

//Valida conexión
if(!$conec){
    die("Error al conectar: " . mysqli_connect_error());
}
?>