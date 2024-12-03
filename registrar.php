<?php
require_once 'clases/Agenda.php' ;
require_once 'clases/Usuario.php';
require_once 'conexion/conexion.php';

$usuario = new Usuario($conexion);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo= $_POST['email'];
    $contraseña_encriptada = $_POST['password'];

    echo $usuario->registrarUsuario($nombre, $correo, $contraseña_encriptada);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Personal Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="color-skyblue">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 align="center">Agenda Personal</h1> <br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Crear una cuenta</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre Completo</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre completo">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo Electronico</label>
                                    <input type="email" class="form-control" name="email" placeholder="Ingrese su correo electronico">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="password" placeholder="Ingrese una contraseña">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" name="recuerdame">
                                    <label class="form-check-label" for="rememberMe">Recuerdame</label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Registarse</button>
                        </form>
                        <div class="mb-3">
                            <label for="">¿Ya tienes una cuenta? <a href="login.php">Inicia Sesion</a> o deseas volver al <a href="index.php">Inicio</a></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>