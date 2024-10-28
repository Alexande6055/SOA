<?php
include_once "conexion.php";
class crudD {
    public static function borrarEstudiante() {
        $objetoconexion = new conexion();
        $conn = $objetoconexion->conectar();
        $cedula = $_REQUEST['cedula'];

        if (!empty($cedula)) {
            $borrarestudiante = "DELETE FROM estudiantes WHERE estCedula = :cedula";
            $result = $conn->prepare($borrarestudiante);
            $result->bindParam(':cedula', $cedula); // Usando parámetros para evitar inyecciones SQL

            if ($result->execute()) {
                echo json_encode(['success' => true, 'message' => 'Estudiante eliminado correctamente.']);
            } else {
                echo json_encode(['success' => false, 'errorMsg' => 'Error al eliminar el estudiante.']);
            }
        } else {
            echo json_encode(['success' => false, 'errorMsg' => 'Cédula no especificada.']);
        }
    }
}
?>
