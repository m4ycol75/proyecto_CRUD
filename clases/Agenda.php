 <?php
require_once __DIR__ . '/../conexion/conexion.php';


    class Agenda
    {
        public $nombre, $actividad, $descripcion, $fecha_inicio, $fecha_limite, $recordatorio, $estado;
        public $conexion;


        public function __construct($conexion)
        {
        
            $this->conexion = $conexion;
        }

        public function registrarActividad($nombre,$actividad,$descripcion,$fecha_inicio,$fecha_limite,$recordatorio,$estado)
        {
            $sql = "INSERT INTO `agenda`(`nombre`, `actividad`, `descripcion`, `fecha_inicio`, `fecha_limite`, `recordatorio`, `estado`) VALUES (?, ?, ? ,?, ?, ?, ?)";
            $stmt = mysqli_prepare($this->conexion, $sql);
            mysqli_stmt_bind_param($stmt, "sssssss", $nombre, $actividad, $descripcion, $fecha_inicio, $fecha_limite, $recordatorio, $estado);

            if (mysqli_stmt_execute($stmt)) {
                echo "Actividad registrada correctamente.";
            } else {
                echo "Error al registrar la actividad: " . mysqli_error($this->conexion);
            }

            mysqli_stmt_close($stmt);
        }

        public static function mostrarActividad($conexion)
        {
            $sql = "SELECT * FROM agenda";
            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($resultado) > 0) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "ID: " . $fila["id"] . " - Nombre: " . $fila["nombre"] . " - Actividad: " . $fila["actividad"] . " - Descripcion: " . $fila["descripcion"] . $fila["fecha_inicio"] . $fila["fecha_limete"] . $fila["recordatorio"] . $fila["estado"] ."<br>";
                }
            } else {
                echo "No hay resultados.";
            }

            mysqli_stmt_close($stmt);
        }


        public function actualizarActividad($id,$nombre,$actividad,$descripcion,$fecha_inicio,$fecha_limite,$recordatorio,$estado)
        {
            $sql = "UPDATE agenda SET nombre=?,actividad=?,descripcion=?,fecha_inicio=?,fecha_limite=?,recordatorio=?,estado=? WHERE id = ?";
            $stmt = mysqli_prepare($this->conexion, $sql);
            mysqli_stmt_bind_param($stmt,"sssssssi",$nombre,$actividad,$descripcion,$fecha_inicio,$fecha_limite,$recordatorio,$estado,$id);
            
            if(mysqli_stmt_execute($stmt)){
                echo "Actualizado correctamente";
            }else{
                echo "Error al actualizar".mysqli_error($this->conexion);
            }

            mysqli_stmt_close($stmt);
        }

        public function eliminarActividad($id) {
            $sql = "DELETE FROM agenda WHERE id = ?";
            $stmt = mysqli_prepare($this->conexion, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id);
    
            if (mysqli_stmt_execute($stmt)) {
                echo "Actividad eliminada correctamente.";
            } else {
                echo "Error al eliminar la actividad: " . mysqli_error($this->conexion);
            }
    
            mysqli_stmt_close($stmt);
        }
    }

    

?>