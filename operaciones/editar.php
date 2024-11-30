<?php
require_once '../clases/Agenda.php';
require_once '../conexion/conexion.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];


$sql = "SELECT * FROM `agenda` WHERE id= $id";
$resultado = mysqli_query($conexion, $sql);
$datosActividad = mysqli_fetch_assoc($resultado);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $actividad = $_POST["actividad"];
    $descripcion = $_POST["descripcion"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_limite = $_POST["fecha_limite"];
    $recordatorio = $_POST["recordatorio"];
    $estado = $_POST["estado"];

    $actividad = new Agenda($conexion);
    $actividad->actualizarActividad($id);

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
    <title>Ediatr Actividad</title>
</head>

<body>
    <div class="container mt-4">
        <div class="card-body">
            <h1>Editar Actividad</h1>
            <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $datosActividad['id']; ?>">

                <div class="row">
                    <div class="mb-3 mt-3 col-6">
                        <label for="" class="form-label">Nombre </label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $datosActividad['nombre']; ?>">
                    </div>
                    <div class="mb-3 mt-3 col-6">
                        <label for="" class="form-label">Actividad</label>
                        <input type="text" class="form-control" name="actividad" id="actividad" value="<?php echo $datosActividad['actividad']; ?>">

                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 mt-3 col-6">
                        <label for="" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $datosActividad['descripcion']; ?>">

                    </div>
                    <div class="mb-3 mt-3 col-3">
                        <label for="" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo $datosActividad['fecha_inicio']; ?>">
                    </div>
                    <div class="mb-3 mt-3 col-3">
                        <label for="" class="form-label">Fecha Limite</label>
                        <input type="date" class="form-control" name="fecha_limite" id="fecha_limite" value="<?php echo $datosActividad['fecha_limite']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 mt-3 col-6">
                        <label for="" class="form-label">Recordatorio</label>
                        <input type="text" class="form-control" name="recordatorio" id="recordatorio" value="<?php $datosActividad['recordatorio']; ?>">

                    </div>
                    <div class="mb-3 mt-3 col-6">
                        <label for="" class="form-label">Estado</label><br>
                        <!--<input type="text" class="form-control" name="estado" id="estado">-->
                        <select class="form-select" name="estado" id="estado">
                            <option value="por inciar" <?php echo ($datosActividad['estado'] == 'por inciar') ? 'selected' : ''; ?>>Por iniciar</option>
                            <option value="en proceso" <?php echo ($datosActividad['estado'] == 'en proceso') ? 'selected' : ''; ?>>En proceso</option>
                            <option value="completado" <?php echo ($datosActividad['estado'] == 'completado') ? 'selected' : ''; ?>>Completado</option>
                        </select>

                    </div>
                </div>
                <div class="row">

                    <div class="mb-3 mt-3 col-6">
                        <input type="submit" class="btn btn-primary" value="Actualizar Actividad">
                        <a href="inicio.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

</body>

</html>