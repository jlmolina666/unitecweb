<?php
//Archivo de conexion PDO
require("constants.php");

$conn = new PDO("mysql:host=".$servername.";dbname=".$database."",$user,$pass);

?>