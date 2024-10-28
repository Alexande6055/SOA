<?php
include_once "conexion.php";
class crudBUSCAR {
    public static function seleccionarEstudiantesPorCedula($cedula) {
        $selectEstudiantes = "SELECT 
                                estudiantes.estCedula,
                                estudiantes.estNombre,
                                estudiantes.estApellido,
                                estudiantes.estTelefono,
                                estudiantes.estDireccion,
                                cursos.Nombre 
                                FROM estudiantes
                                JOIN cursos ON estudiantes.curId = cursos.curId
                                WHERE estudiantes.estCedula= :cedula"; 
        $objetoconexion = new conexion();
        $conn = $objetoconexion->conectar();
        $result = $conn->prepare($selectEstudiantes);
        $result->bindParam(':cedula', $cedula, PDO::PARAM_STR); 
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        $dataJson = json_encode($data);
        echo $dataJson;
    }
}

?>