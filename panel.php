<?php
require_once('auth.php');




?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>AgendaPro Inicio</title>
</head>

<body>
    <div class="container mt-4">
        <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>
        <p>Felicidades por elegirnos de ahora en adelante podra usar nuestro sisema de agenda para optimizar su tiempo y ser mas eficaz en sus actividades</p>



        <div>
            <h2 class="mt-5">Descripción</h2>
            <p>AgendaPro es una aplicación web diseñada para ayudarte a organizar y gestionar tus actividades de manera eficiente. Con esta herramienta, podrás llevar el control de tus eventos, citas y tareas en un solo lugar, brindándote una visión general de tu agenda personal.</p>



            <h2 class="mt-5">Recomendaciones de uso</h2>
            <ul>
                <li>Mantén tu agenda actualizada: Agrega tus actividades tan pronto como las programes para tener una visión general de tu calendario.</li>
                <li>Utiliza las categorías y prioridades: Organiza tus actividades mediante categorías (trabajo, personal, etc.) y prioridades para facilitar su gestión.</li>
                <li>Configura los recordatorios: Asegúrate de recibir alertas oportunas para tus actividades y no olvidar nada importante.</li>
                <li>Sincroniza con otros dispositivos: Conecta tu cuenta de AgendaPro con tus dispositivos móviles y otros calendarios para mantener tu agenda siempre actualizada.</li>
                <li>Comparte tu agenda: Si lo deseas, puedes compartir tu agenda con familiares, amigos o colegas para coordinar actividades en conjunto.</li>
            </ul>

            <p class="mt-5">¡Disfruta de una mejor organización y productividad con AgendaPro!</p>
        </div>
        <div>
            <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
            <a href="operaciones/inicio.php" class="btn btn-primary">Registra tus actividades</a>
        </div>
    </div>
</body>

</html>