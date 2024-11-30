<?php
require_once '../clases/Agenda.php';
require_once '../conexion/conexion.php';

$agenda = new Agenda($conexion);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $actividad= $_POST['actividad'];
    $descripcion= $_POST['descripcion'];
    $fecha_inicio= $_POST['fecha_inicio'];
    $fecha_limite= $_POST['fecha_limite'];
    $recordatoprio= $_POST['recordatorio'];
    $estado= $_POST['estado'];

    echo $agenda->registrarActividad($nombre, $actividad, $descripcion, $fecha_inicio, $fecha_limite, $recordatoprio, $estado);
    header("Location: inicio.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Registrar Nueva Actividad</title>
</head>

<body>
    <div class="container mt-4">
        <div class="card-body">
            <h1>Registro de Nueva Actividad</h1>
            <form action="" method="post">
                <div class="row">
                    <div class="mb-3 mt-3 col-6">
                        <label for="" class="form-label">Nombre </label>
                        
                        <input type="text" class="form-control" name="nombre">
                    </div>
                    <div class="mb-3 mt-3 col-6">
                        <label for="" class="form-label">Actividad</label>
                        <input type="text" class="form-control" name="actividad" id="actividad">

                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 mt-3 col-6">
                        <label for="" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion">

                    </div>
                    <div class="mb-3 mt-3 col-3">
                        <label for="" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                    </div>
                    <div class="mb-3 mt-3 col-3">
                        <label for="" class="form-label">Fecha Limite</label>
                        <input type="date" class="form-control" name="fecha_limite" id="fecha_limite">
                    </div>
                </div>                   
                <div class="row">
                    <div class="mb-3 mt-3 col-6">
                        <label for="" class="form-label">Recordatorio</label>
                        <input type="text" class="form-control" name="recordatorio" id="recordatorio">

                    </div>
                    <div class="mb-3 mt-3 col-6">
                        <label for="" class="form-label">Estado</label><br>
                        <select class="form-select" name="estado" id="">
                            <option value="por inciar">Por iniciar</option>
                            <option value="en proceso">En proceso</option>
                            <option value="completado">Completado</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="mb-3 mt-3 col-6">
                        <input type="submit" class="btn btn-primary" value="Registrar Actividad">
                        <a href="inicio.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

</body>

</html>