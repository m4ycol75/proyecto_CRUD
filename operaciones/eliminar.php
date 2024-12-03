<?php
require_once '../clases/Agenda.php';
require_once '../conexion/conexion.php';
require_once('auth.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Crear instancia y eliminar estudiante
    $actividad = new Agenda($conexion);
    $actividad->eliminarActividad($id);

    header("Location: inicio.php"); // Redirige al índice después de eliminar
}
?>