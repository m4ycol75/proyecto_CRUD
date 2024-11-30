<?php
require_once '../clases/Agenda.php';
require_once '../conexion/conexion.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Agenda Personal</title>
</head>


<body>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <h1>Agenda Personal</h1>
            </div>
            <div class="col text-end">
                <a href="nuevo.php" class="btn btn-primary">Nueva Actividad</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered w-auto">
                <thead class="table-darck">
                    <tr>
                        <th>Nombre</th>
                        <th>Actividad</th>
                        <th>Descripcion</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha Limite</th>
                        <th>Recordatorio</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM agenda";
                    $resultado = mysqli_query($conexion, $sql);

                    if (mysqli_num_rows($resultado) > 0) {
                        while ($fila = mysqli_fetch_assoc($resultado)) {

                    ?>
                            <tr>
                                <td><?php echo $fila["nombre"]
                                    ?></td>
                                <td><?php echo $fila["actividad"]
                                    ?></td>
                                <td><?php echo $fila["descripcion"]
                                    ?></td>
                                <td><?php echo $fila["fecha_inicio"]
                                    ?></td>
                                <td><?php echo $fila["fecha_limite"]
                                    ?></td>
                                <td><?php echo $fila["recordatorio"]
                                    ?></td>
                                <td><?php echo $fila["estado"]
                                    ?></td>
                                <td><a href="editar.php" class="btn btn-success">Editar</a>
                                    <a href="" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "No se emcontraron resultados";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>