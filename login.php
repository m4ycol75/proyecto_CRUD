<?php
session_start();
require_once('../Proyecto_CRUD/clases/Agenda.php');
require_once(__DIR__ . '/clases/Agenda.php');
require_once(__DIR__ . '/clases/Usuario.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $contraseña = $_POST['contrasena'];

    $query = "SELECT * FROM usuario WHERE correo = '$correo'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verificar la contraseña
        if (password_verify($password, $user['contrasena'])) {
            $_SESSION['usuario'] = $user['nombre'];
            $_SESSION['autenticado'] = true; 
            header("Location: operaciones/inicio.php");
            exit;
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "El usuario no existe.";
    }
}

$usuario = new Usuario($conexion);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['email'];
    $contraseña_encriptada = $_POST['contrasena'];

    echo $usuario->iniciarSesion($correo, $contraseña);
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
                                    <input type="email" class="form-control" name="correo" placeholder="Ingrese su correo electronico">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="contrasena" placeholder="Ingrese tu contraseña">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" name="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Recuerdame</label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Inicair Sesion</button>
                        </form>
                        <div class="mb-3">
                            <label for="">¿Todavia no tienes una cuenta? <a href="registrar.php">Registrate</a></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>