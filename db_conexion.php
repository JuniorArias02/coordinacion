<?php
// Configuración de la conexión
$host = "localhost";
$user = "root";
$pass = "";
$db = "coordinacion";

// Conexión a la base de datos
$con = mysqli_connect($host, $user, $pass, $db);

// Verificar la conexión
if (mysqli_connect_errno()) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
