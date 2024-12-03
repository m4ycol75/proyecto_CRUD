<?php
session_start();
require_once '../Proyecto_CRUD/clases/Agenda.php' ;
require_once 'clases/Usuario.php';
require_once 'conexion/conexion.php';

$usuario = new Usuario($conexion);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir y sanitizar entradas
    $correo = mysqli_real_escape_string($conexion, $_POST['email']);
    $contraseña = $_POST['password'];

    // Llamar a la función iniciarSesion
    $resultado = $usuario->iniciarSesion($correo, $contraseña);

    if ($resultado === "success") {
        header("Location: panel.php"); // Redirigir si es exitoso
        exit;
    } else {
        echo $resultado; // Mostrar mensaje de error
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Personal Incio de Sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 align="center">Agenda Personal</h1> <br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Inicia Sesion</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo Electronico</label>
                                    <input type="email" class="form-control" name="email" placeholder="Ingrese su correo electronico">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="password" placeholder="Ingrese tu contraseña">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" name="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Recuerdame</label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Inicair Sesion</button>
                        </form>
                        <div class="mb-3">
                            <label for="">¿Todavia no tienes una cuenta? <a href="registrar.php">Registrate</a> o deseas volver al <a href="index.php">Inicio</a></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>