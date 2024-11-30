<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'agenda_personal';

// Conexión a la base de datos
$conexion = mysqli_connect($host, $username, $password, $database);

// Verificar la conexión
if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>