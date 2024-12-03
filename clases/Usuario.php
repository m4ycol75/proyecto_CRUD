<?php
require_once 'conexion/conexion.php';

class Usuario
{
    public $conexion;
    public $nombre, $correo, $contraseña;

    public function __construct($conexion = null, $nombre = null, $correo = null, $contraseña = null)
    {
        $this->conexion = $conexion;
    }

    public function registrarUsuario($nombre, $correo, $contraseña)
    {
        $contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `usuario`(`nombre`, `correo`, `contraseña`) VALUES (?, ?, ? )";
        $stmt = mysqli_prepare($this->conexion, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $nombre, $correo, $contraseña_encriptada);

        if (mysqli_stmt_execute($stmt)) {
            echo "Usuario registrado correctamente.";
        } else {
            echo "Error al registrar el usuario: " . mysqli_error($this->conexion);
        }

        mysqli_stmt_close($stmt);
    }

    public function iniciarSesion($correo, $contraseña)
{
    $sql = "SELECT * FROM usuario WHERE correo = '$correo'";
    $resultado = mysqli_query($this->conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        if (password_verify($contraseña, $usuario['contraseña'])) {
            // Crear las variables de sesión aquí
            $_SESSION['usuario'] = $usuario['nombre'];
            $_SESSION['autenticado'] = true;
            return "success"; // Devuelve "success" si todo está correcto
        } else {
            return "Contraseña incorrecta";
        }
    } else {
        return "El usuario no existe";
    }
}

}
